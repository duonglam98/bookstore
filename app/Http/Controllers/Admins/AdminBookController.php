<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookOrder;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest()->paginate(6);
        $category = Category::get();
    
        return view('admins.books.index', compact('books', 'category'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
         $category = Category::get();
   
        return view('admins.books.create', [
            'category' => $category
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'name' => 'required',
            'author' => 'required',
            'category_id' => 'required',
            'code' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'weight' => 'required',
            'NXB' => 'required',
        ]);
  
        $input = $request->all();
        // dd($input);
        $categoryName = Category::find($input['category_id'])->name;

        // dd($categoryName);
        $input['category'] = $categoryName;
        
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        if (Book::where('name', $request->name)->exists()) {
            return redirect()->route('admin.books.create')
                        ->with('Lỗi','Tên sách bị trùng!');
        }
         else if (Book::where('code', $request->code)->exists()) {
            return redirect()->route('admin.books.create')
                        ->with('Lỗi','Mã sách bị trùng!');
        }
        else {
            Book::create($input);
     
            return redirect()->route('admin.books.index')
                            ->with('Thành công','Đã thêm sách mới!');
        }
    
       
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admins.books.show',compact('book'));
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $category = Category::get();
        return view('admins.books.edit',compact('book', 'category'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'category_id' => 'required',
            'code' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'weight' => 'required',
            'NXB' => 'required',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('images')) {
            $destinationPath = '/bookstore/images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['images'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $book->update($input);
    
        return redirect()->route('admin.books.index')
                        ->with('Thành công','Cập nhật  sách thành công!');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
     
        return redirect()->route('admin.books.index')
                        ->with('Thành công','Đã xoá sách!');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('books')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('category', 'like', '%'.$query.'%')
         ->orWhere('quantity', 'like', '%'.$query.'%')
         ->orWhere('price', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('books')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td></td>
         <td>'.$row->name.'</td>
         <td>'.$row->category.'</td>
         <td>'.$row->quantity.'</td>
         <td>'.$row->price.'</td>
         
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">Không có dữ liệu được tìm thấy!</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}