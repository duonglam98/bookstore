<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\OrderMail;
use App\Models\Order;
use Mail;


class MailController extends Controller
{
    public function sendOrderMail()
    {
        $email = 'xinhit98@gmail.com';
        $currentUserId = auth()->id();
        $order = Order::where('user_id', $currentUserId)
            ->where('status', 1)
            ->first();
            
        $order = [
            'title' => 'Nhà sách Nhân Dân đã nhận đơn hàng',
            'url' => 'localhost:3000/books'
        ];
  
        Mail::to($email)->send(new OrderMail($order));
   
        dd("Mail sent!");
        // return view('books.index');
    }
}