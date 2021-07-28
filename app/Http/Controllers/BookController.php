<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookOrder;
use App\Models\Order;
use App\Models\Category;
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
    public function index(Request $request)
    {
        // dd($request->all());
        $categorySubName = $request->category;
        $user = Auth::user();
        $category = Category::get();
       
        if ($categorySubName) {
            $categoryId = $category->where('sub_name', $categorySubName)->first()->id;
            // dd($categoryId);
            $books = Book::where('category_id', $categoryId)->latest()->paginate(8);
            $data = [
                'user' => $user,
                'books' => $books,
                'category' => $category,
            ];
            return view('books.categories.index', compact('category'), $data)
                ->with((request()->input('page', 1) - 1) * 8);
        } else {
            $books = Book::latest()->paginate(8);

        }

        $bookSlides = Book::offset(0)->limit(1)->get();
        $nameCategories = Category::offset(0)->limit(1)->get();

        $data = [
            'user' => $user,
            'books' => $books,
            'category' => $category,
            'bookSlides' => $bookSlides,
            'nameCategories' => $nameCategories,
        ];
    
        return view('books.index', compact('books'), $data)
            ->with((request()->input('page', 1) - 1) * 8);
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
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'weight',
            'NXB',

        ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Book::create($input);
     
        return redirect()->route('books.index')
                        ->with('Thành công','Thêm sách thành công!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $category = Category::get();
        $book = Book::find($id);
        $data = [
            'user' => $user,
            'category' => $category,
        ];
        // $books = Book::find($id);
        return view('books.shopDetail', ['book' => $book], $data);
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
            return back()->with('status', 'Cập nhật sách thất bại');
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

    public function search(Request $request)
    {
        $user = Auth::user();
        $category = Category::get();

        $data = [
            'user' => $user,
            'category' => $category,
        ];
        $key = trim($request->get('search'));

        $books = Book::query()
            ->where('name', 'like', "%{$key}%")
            ->orWhere('author', 'like', "%{$key}%")
            ->orWhere('NXB', 'like', "%{$key}%")
            ->get();

        return view('books.search', [
            'key' => $key,
            'books' => $books,
            
        ], $data);
    }

}

