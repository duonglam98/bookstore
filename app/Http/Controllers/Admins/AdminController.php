<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookOrder;
use App\Models\Order;
use App\Models\User;
use Cache;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public $viewData = [];

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Order $order)
    {
       
        // Tổng đơn hàng
        $orders = Order::latest()->limit(5)->get();
        $count_Order = Order::count();

        //Tổng số khách hàng đã đăng ký thành viên của trang web
        $userAuth = Auth::user()->count();

        //Số khách hàng đang online
        $users = DB::table('users')->get();
        $dem = 0;
        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                $dem++;
            else {
                $dem;
            }
        }

        //Tổng doanh thu
        $currentUser = auth()->user();
        $order = $currentUser->orders()->where('status', 3)->get();
        $orderPrices = Order::sum('total_price');
 

        return view('admins.index', compact('orders', 'order', 'userAuth', 'orderPrices', 'dem'))->with(['count_order' => $count_Order]);
    }

    /**
 * Get the new notification data for the navbar notification.
 *
 * @param Request $request
 * @return Array
 */
public function getNotificationsData(Request $request)
{
    // For the sake of simplicity, assume we have a variable called
    // $notifications with the unread notifications. Each notification
    // have the next properties:
    // icon: An icon for the notification.
    // text: A text for the notification.
    // time: The time since notification was created on the server.
    // At next, we define a hardcoded variable with the explained format,
    // but you can assume this data comes from a database query.

    $notifications = [
        [
            'icon' => 'fas fa-fw fa-envelope',
            'text' => rand(0, 10) . ' new messages',
            'time' => rand(0, 10) . ' minutes',
        ],
        [
            'icon' => 'fas fa-fw fa-users text-primary',
            'text' => rand(0, 10) . ' friend requests',
            'time' => rand(0, 60) . ' minutes',
        ],
        // [
        //     'icon' => 'fas fa-fw fa-file text-danger',
        //     'text' => rand(0, 10) . ' new reports',
        //     'time' => rand(0, 60) . ' minutes',
        // ],
    ];

    // Now, we create the notification dropdown main content.

    $dropdownHtml = '';

    foreach ($notifications as $key => $not) {
        $icon = "<i class='mr-2 {$not['icon']}'></i>";

        $time = "<span class='float-right text-muted text-sm'>
                   {$not['time']}
                 </span>";

        $dropdownHtml .= "<a href='#' class='dropdown-item'>
                            {$icon}{$not['text']}{$time}
                          </a>";

        if ($key < count($notifications) - 1) {
            $dropdownHtml .= "<div class='dropdown-divider'></div>";
        }
    }

    // Return the new notification data.

    return [
        'label'       => count($notifications),
        'label_color' => 'danger',
        'icon_color'  => 'dark',
        'dropdown'    => $dropdownHtml,
    ];
}

public function edit(Order $order)
    {
        // $user = Auth::user();
        $orders = Order::get();
        return view('admins.orders.edit', compact('orders', 'order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);
  
        $input = $request->all();

        $order->update($input);
    
        return redirect()->route('admin.orders.index')
                        ->with('Thành công','Cập nhật thông tin đơn hàng thành công!');
    }

    public function countOrder()
    {
        $count_Order = Order::count();
        return view('admins.index')->with(['count' => $count_Order]);
    }
    
}

