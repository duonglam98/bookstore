<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookOrder;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;

class BookController extends Controller
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
        $books = Book::paginate(1);
        $data = [
            'user' => auth()->user(),
            'books' => $books,
        ];

        return view('books.index', $data);
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
    public function store(StoreProductRequest $request)
    {
      
        $inputData = $request->only([
            'name',
            'author',
            'code',
            'price',
            'quantity',
            'description',
            'images',
            'weight',
            'NXB',

        ]);

         //converting image into the string
        //  $image = $request->image;

        //  $image_new_name = time().$image->getClientOriginalName();
 
        //  $image->move('uploads/books',$image_new_name);

        // \Log::info($inputData);
        try {
            $book = Book::create(array_merge($inputData, [
                'user_id' => auth()->id()
            ]));

            return redirect('/books/' . $book->id);
        } catch (\Throwable $th) {
            return back()->with('status', 'Tạo sách thất bại!');
        }

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        if (!$book) {
            abort(404);
        }

        $data = [
            'user' => auth()->user(),
            'book' => $book,
        ];

        return view('books.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $inputData = $request->all();
        $book = Book::find($id);

        try {
            $book->update([
                'name' => $inputData['name'],
                'code' => $inputData['code'],
                'author' => $inputData['author'],
                'price' => $inputData['price'],
                'quantity' => $inputData['quantity'],
                'description' => $inputData['description'],
                'images' => $inputData['images'],
                'weight' => $inputData['weight'],
                'NXB' => $inputData['NXB'],
            ]);

            return redirect('/books/' . $book->id);
        } catch (\Throwable $th) {
            return back()->with('status', 'Cập nhật sách thất bại');;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        try {
            $book->delete();

            return redirect('/books')->with('status', 'Đã Xóa!');
        } catch (\Throwable $th) {
            return back()->with('status', 'Không thể xóa!');
        }
    }
}

