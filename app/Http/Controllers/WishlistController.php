<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Category;
use App\Models\Book;

class WishlistController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $books = Book::get();
        $bookName = $request->$books;
        // dd($request->$books);
        // $bookId = $books->where('image', $bookName)->first()->id;
        
        $category = Category::get();
        $user = Auth::user(); 
        
        $wishlists = Wishlist::where("user_id", $user->id)->paginate(10); 
       
        return view('users.accounts.wishlist', compact('user', 'books', 'category', 'wishlists'));
    }

    /**
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
        $wishData = [
            'user_id' => $currentUserId,
        ];

        // kiểm tra người dùng hiện thời có đơn hàng mới
        $currentWish = Wishlist::where('user_id', $currentUserId)
            ->where('status', 1)
            ->first();
        
        if ($currentWish) {
            try {
                // $currentWish = Wishlist::create($wishData);
                
                // Tạo wishlist
                $bookWishData = [
                    'user_id' => auth()->id(),
                    'book_id' => $inputData['book_id'],
                    'name' => $book->name,
                    'quantity' => $book->quantity,
                    'image' => $inputData['image'],
                    'price' => $book->price,
                ];
                $bookWish = Wishlist::create($bookWishData);
                \Log::info($bookWish);
            } catch (\Throwable $th) {
                \Log::info('Tạo danh sách thất bại!');
                \Log::info($th);

                return json_encode([
                    'status' => false,
                    'msg' => 'Có lỗi ở đâu đó!',
                ]);
            }

            return json_encode([
                'status' => true,
                'msg' => 'Đã thêm vào danh sách yêu thích!',
                
            ]);

        } 

        return json_encode([
            'status' => true,
            'msg' => 'Đã thêm danh sách yêu thích',
            
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bookWishId)
    {
        $bookWish = Wishlist::find($bookWishId);
        
        try {
            $bookWish->delete();

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
}
