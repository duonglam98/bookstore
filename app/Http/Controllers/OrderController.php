<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookOrder;
use App\Models\Order;
use App\Models\Category;
use App\Mail\OrderShipped;
use App\Models\User;

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
        $category = Category::get();
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
            'category' => $category,
        ];
        return view('orders.cart', $data);
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
            'image',
            'quantity',
           
        ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        $bookId = $inputData['book_id'];
        $book = Book::find($bookId);

        if (!$book) {
            return json_encode([
                'status' => false,
                'msg' => 'Cuốn sách này đã bị xóa.',
            ]);
        }

        // Tạo order
        $currentUserId = auth()->id();
        $orderData = [
            'code' => 'BOOK_' . now()->format('Ymd_His') . '_' . $currentUserId,
            'user_id' => $currentUserId,
        ];

        // kiểm tra người dùng hiện thời có đơn hàng mới
        $currentOrder = Order::where('user_id', $currentUserId)
            ->where('status', 1)
            ->first();

        if (!$currentOrder) {
            try {
                $currentOrder = Order::create($orderData);

                // Tạo book_order
                $bookOrderData = [
                    'book_id' => $inputData['book_id'],
                    'quantity' => $inputData['quantity'],
                    'image' => $inputData['image'],
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
                    'image' => $inputData['image'],
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
                'msg' => 'Có lỗi ở store!',
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
     * @param  int  $bookOrderId
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

    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $bookOrderId
     * @return \Illuminate\Http\Response
     */
    public function destroy($bookOrderId)
    {
        $bookOrder = BookOrder::find($bookOrderId);
        
        try {
            $bookOrder->delete();

            $result =[
                'status' => true,
                'msg' => 'Xoá thành công!',
            ];
        } catch (\Throwable $th) {
            \Log::error($th);

            $result = [
                'status' => false,
                'msg' => 'Xoá thất bại!',
            ];
        }

        return json_encode($result);
    }
    public function checkout(Request $request)
    {
        
        $input = $request->all();
        // dd($input);
       
        $currentUser = auth()->user();
        $order = $currentUser->orders()->where('status', 1)->first();
        $orderId = $order->id;
        //sử dụng quan hệ relationship
        $bookOrders = BookOrder::where('order_id', $orderId)->get();
        // dd($bookOrders->toArray(), $orderId);
        $totalPrice = 0;
        foreach($bookOrders as $bookOrder) {
            $totalPrice += $bookOrder->quantity * $bookOrder->price;
            
        }

        // dd($totalPrice);
        // $totalPrice->save();
        try {
            $order->total_price = $totalPrice;
            $order->user_name = $input['user_name'];
            $order->phone = $input['phone'];
            $order->address = $input['address'];
            $order->status = 2;
            $order->save();

            // Send mail to user
            \Mail::to($currentUser->email)->send(new \App\Mail\OrderShipped($order));

           
            $result =[
                'status' => true,
                'msg' => 'Đặt hàng thành công, cảm ơn bạn!',
            ];
        } catch (\Throwable $th) {
            \Log::error($th);
            $result = [
                'status' => false,
                'msg' => 'Lỗi đặt hàng!',
            ];
        }

        return json_encode($result);
    }

    public function checkOutCart() {
        $currentUserId = auth()->id();
        $order = Order::where('user_id', $currentUserId)
            ->where('status', 1)
            ->first();
            if ($order->books->count() < 1) {
                return redirect()->route('books.index'); 
    
            }
        
        $bookOrders = null;

        if ($order) {
            $bookOrders = BookOrder::where('order_id', $order->id)->get();
        } 

        $categories = Category::get();
        $addresses = User::where('id', $currentUserId)->get();
        // dd($addresses);

        $data = [
            'category' => $categories,
            'user' => auth()->user(),
            'bookOrders' => $bookOrders,
            'addresses' => $addresses,
        ];
        if ($order->books->count() < 1) {
            return view('books.index'); 

        } else{
        return view ('orders.checkOut', $data);
    }
    }

   
}