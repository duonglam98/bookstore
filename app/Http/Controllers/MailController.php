<?php

namespace App\Http\Controllers;

use App\Mail\NSND;
use Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendMail()
    {
        $email = 'xinhit98@gmail.com';
   
        $maildata = [
            'title' => 'Nhà sách Nhân Dân cảm ơn quý khách đã đặt hàng!',
            'url' => 'localhost:3000/books/'
        ];
  
        Mail::to($email)->send(new NSND($maildata));
   
        dd("Đặt hàng thành công!");
    }
}
