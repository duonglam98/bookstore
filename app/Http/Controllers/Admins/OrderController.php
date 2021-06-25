<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookOrder;
use App\Models\Order;
use App\Mail\OrderMail;
use Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUserId = auth()->id();
        $order = Order::where('user_id', $currentUserId)
            ->where('status', 1)
            ->first();

        $bookOrders = null;

        if ($order) {
            $bookOrders = BookOrder::where('order_id', $order->id)->get();
        }

        $data = [
            'user' => auth()->user(),
            'bookOrders' => $bookOrders,
        ];
        return view('orders.cart', $data);
    }

    public function checkOutCart() {
        return view ('orders.checkOut');
    }
    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputData = $request->only([
            'book_id',
            'quantity',
        ]);

        $bookId = $inputData['book_id'];
        $book = Book::find($bookId);

        if (!$book) {
            return json_encode([
                'status' => false,
                'msg' => 'Cuốn sách này đã bị xóa.',
            ]);
        }

        // Create order
        $currentUserId = auth()->id();
        $orderData = [
            'code' => 'BOOK_' . now()->format('Ymd_His') . '_' . $currentUserId,
            'user_id' => $currentUserId,
        ];

        // Check current user has new order
        $currentOrder = Order::where('user_id', $currentUserId)
            ->where('status', 1)
            ->first();

        if (!$currentOrder) {
            try {
                $currentOrder = Order::create($orderData);

                // Create book_order
                $bookOrderData = [
                    'book_id' => $inputData['book_id'],
                    'quantity' => $inputData['quantity'],
                    'order_id' => $currentOrder->id,
                    'price' => $book->price,
                ];
                $bookOrder = BookOrder::create($bookOrderData);
            } catch (\Throwable $th) {
                \Log::info('Tạo đơn hàng thất bại');
                \Log::info($th);

                return json_encode([
                    'status' => false,
                    'msg' => 'Có lỗi ở đâu đó!',
                ]);
            }

            $cartNumber = BookOrder::where('order_id', $currentOrder->id)
                ->sum('quantity');

            return json_encode([
                'status' => true,
                'msg' => 'Thêm sản phẩm vào giỏ hàng thành công',
                'quantity' => $cartNumber,
            ]);
        }

        // co order roi thi todo
        // Check book_order da ton tai hay chua
        $currentBookOrder = BookOrder::where('book_id', $bookId)
            ->where('order_id', $currentOrder->id)
            ->first();

        try {
            if (!$currentBookOrder) {
                // Create book_order
                $bookOrderData = [
                    'book_id' => $inputData['book_id'],
                    'quantity' => $inputData['quantity'],
                    'order_id' => $currentOrder->id,
                    'price' => $book->price,
                ];
                $bookOrder = BookOrder::create($bookOrderData);
            } else {
                $currentBookOrder->quantity += $inputData['quantity'];
                $currentBookOrder->save();
            }
        } catch (\Throwable $th) {
            \Log::error($th);

            return json_encode([
                'status' => false,
                'msg' => 'Có lỗi ở đây!',
            ]);
        }

        $cartNumber = BookOrder::where('order_id', $currentOrder->id)
            ->sum('quantity');

        return json_encode([
            'status' => true,
            'msg' => 'Thêm vào giỏ hàng thành công!',
            'quantity' => $cartNumber,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bookOrderId)
    {
        $quantity = $request->quantity;

        $bookOrder = BookOrder::find($bookOrderId);

        try {
            $bookOrder->quantity = $quantity;
            $bookOrder->save();

            \Log::info('update success');
            $result =[
                'status' => true,
                'msg' => 'Cập nhật thành công!',
                'price' => $bookOrder->price * $quantity,
            ];
        } catch (\Throwable $th) {
            \Log::error($th);
            $result = [
                'status' => false,
                'msg' => 'Có lỗi phát sinh!',
            ];
        }

        return json_encode($result);
    }

    public function checkout(Request $request)
    {
        $currentUser = auth()->user();
        $order = $currentUser->orders()->where('status', 1)->first();
       
        try {
            $order->status = 2;
            $order->save();

            // Send mail to user
            \Mail::to($user->email)->send(new \App\Mail\OrderShipped($order));
            
            $result =[
                'status' => true,
                'msg' => 'Đặt hàng thành công, cảm ơn bạn!',
            ];
        } catch (\Throwable $th) {
            \Log::error($th);
            \Log::info($order);
            $result = [
                'status' => false,
                'msg' => 'Lỗi gửi email!',
            ];
        }

        return json_encode($result);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $bookOrderId
     * @return \Illuminate\Http\Response
     */
    public function destroy($bookOrderId)
    {
        $bookOrder = BookOrder::find($bookOrderId);
        \Log::info($bookOrder);
        try {
            $bookOrder->delete();

            $result =[
                'status' => true,
                'msg' => 'Xóa thành công!',
            ];
        } catch (\Throwable $th) {
            \Log::error($th);

            $result = [
                'status' => false,
                'msg' => 'Xóa thất bại!',
            ];
        }

        return json_encode($result);
    
    }


    public function sendOrderMail()
    {
        $email = 'xinhit98@gmail.com';
        $order = [
            'title' => 'Nhà sách Nhân Dân đã nhận đơn hàng',
            'url' => 'localhost:3000/books'
        ];
  
        Mail::to($email)->send(new OrderMail($order));
   
        dd("Mail sent!");
        // return view('books.index');
    }
}
