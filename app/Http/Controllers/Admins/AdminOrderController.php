<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookOrder;
use App\Models\Order;
use App\Mail\OrderMail;
use Mail;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $orders = Order::latest()->paginate(5);
        
        return view('admins.orders.index', compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    
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
        $categoryName = Category::find($input['category_id'])->name;

        // dd($categoryName);
        $input['category'] = $categoryName;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admins.orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        // $user = Auth::user();
        $orders = Order::get();
        return view('admins.orders.edit', compact('orders', 'order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_name',
            'phone',
            'address',
            'status' ,
        ]);
  
        $input = $request->all();

        $currentUser = auth()->user();
        $orderStatus = $currentUser->orders()->where('status', 3)->first();
       
        $bookOrderId = $orderStatus->id;

        //sử dụng quan hệ relationship
        $bookOrders = BookOrder::where('book_id', $bookOrderId)->get();
        $bookId = Book::where('id', $bookOrderId )->get();
        $desQuantity = 0;
        if($orderStatus) {
            foreach ($bookId as $bookQ) {
                foreach ($bookOrders as $bookOrder){
                    // dd()
                    $desQuantity = $bookQ->quantity - $bookOrder->quantity;
                    
                }

                $bookQ->quantity = $desQuantity;
                // dd($bookQ);
                $bookQ->save();
            }
            
        }
        
    
        
        $order->update($input);
    
        return redirect()->route('admin.orders.index')
                        ->with('Thành công','Cập nhật thông tin đơn hàng thành công!');
    }

    public function checkout(Request $request)
    {
        
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $bookOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
     
        return redirect()->route('admin.orders.index')
                        ->with('Thành công','Đã xoá đơn hàng!');

    
    }


   
}
