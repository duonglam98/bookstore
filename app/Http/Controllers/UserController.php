<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookOrder;
use App\Models\Order;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;

class UserController extends Controller
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
    public function index()
    {
        $category = Category::get();
        $books = Book::paginate(1);
        $data = [
            'user' => auth()->user(),
            'books' => $books,
            'category' => $category,
        ];

        return view('users.accounts.myAccount', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUs()
    {
        $category = Category::get();
        $books = Book::paginate(1);
        $data = [
            'user' => auth()->user(),
            'books' => $books,
            'category' => $category,
        ];

        return view('users.contactUs', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutUs()
    {
        $category = Category::get();
        $books = Book::paginate(1);
        $data = [
            'user' => auth()->user(),
            'books' => $books,
            'category' => $category,
        ];

        return view('users.about', $data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create', [
            'user' => auth()->user(),
        ]);

        \Log::info();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
       
    }

    public function yourOrder(User $user) {
        $currentUser = auth()->user();
        $orders = $currentUser->orders()->get();
        $category = Category::get();
       
        $data = [
            'user' => auth()->user(),
            // 'books' => $books,
            'category' => $category,
            'orders' => $orders,
        ];
        return view('users.accounts.yourOrders', $data)
        ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->viewData['book'] = Book::findOrFail($id);
        $this->viewData['user'] = auth()->user();
        // $this->viewData['cartNumber'] = $cartNumber;

        return view('books.shopDetail', $this->viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $category = Category::get();
        $data = [
            'user' => auth()->user(),
           
            'category' => $category,
        ];

        return view('users.accounts.profile', compact('user'), $data);
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
        $statusCancel = $request->status;
        $currentUser = auth()->user();
        $currentOrder = Order::find($bookOrderId);
        try {
            $currentOrder->status = $statusCancel;
            $currentOrder->save();

            \Log::info('update success');
            $result =[
                'status' => true,
                'msg' => 'Đã huỷ đơn hàng',
                
            ];
        } catch (\Throwable $th) {
            \Log::error($th);
            $result = [
                'status' => false,
                'msg' => 'Có lỗi phát sinh!',
            ];
        }

        return json_encode($result);

        // $$request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'phone' => 'required',
        //     'address' => 'required',
        //     'oldpassword' => 'required',
        //     'newpassword' => 'required',
        //     ]);
        
        //    $hashedPassword = Auth::user()->password;
     
        //    if (\Hash::check($request->oldpassword , $hashedPassword )) {
     
        //      if (!\Hash::check($request->newpassword , $hashedPassword)) {
     
        //           $users =User::find(Auth::user()->id);
        //           $users->password = bcrypt($request->newpassword);
        //           User::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));
                  
        //           session()->flash('message','Mật khẩu cập nhật thành công');
        //           return redirect()->back();
        //         }
     
        //         else{
        //               session()->flash('message','Không thể cập nhật mật khẩu');
        //               return redirect()->back();
        //             }
     
        //        }
     
        //       else{
        //            session()->flash('message','old password doesnt matched ');
        //            return redirect()->back();
        //          }
                
        //         $input = $request->all();
        //         $category->save($input);
        //         return redirect('/users/accounts/' . $user->id . '/edit');
                 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

