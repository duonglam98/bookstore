<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookOrder;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminStatisticController extends Controller
{
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, BookOrder $book_orders)
    {
        //Tổng số sản phẩm trong kho
        $totalQuantityBook = Book::sum('quantity');

        //Tổng số sản phẩm đã bán
        $currentUser = auth()->user();
        $orderBought = $currentUser->orders()->where('status', 3)->count();

        //Sản phẩm bán chạy
        $bookSales = DB::table('book_orders') ->selectRaw('book_id, COUNT(*) as count') ->groupBy('book_id') ->orderBy('count', 'desc')->limit(3) ->get();
        // dd( $bookSales);
        $bookCountSales = Book::get();
    
        // foreach ($bookSales as $bookSale) {
        //     foreach ($bookCountSales as $bookCountSale) {
        //         if($bookSale->book_id == $bookCountSale->id) {
        //             dd( $bookSale->book_id == $bookCountSale->id);
        //             $countId = $bookSale->book_id;
        //             $countName = $bookCountSale->name;
        //             $countBuy = $bookSale->count;
        //             // dd( $bookSale->count);

        //         }

        //     }
            
        // }
        return view ('admins.statistics.data', compact('totalQuantityBook', 'orderBought', 'bookCountSales', 'bookSales'));

       
        
        
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        return view('admins.statistics.potential');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

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
    public function destroy($id)
    {
        //
    }
}
