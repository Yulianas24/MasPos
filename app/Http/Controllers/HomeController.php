<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Json;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if (request('category')) {
            $products = DB::table('products')->join('categories as category', 'category_id', '=', 'category.id')
                ->select('products.id', 'product_name', 'image', 'price', 'category.category_name')
                ->Where('category_name', '=', request('category'))->get();
        } else {
            $products = DB::table('products')->get();
        }




        return view('home', [
            'title' => 'home',
            'categories' => Category::all(),
            'products' => $products,
        ]);
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
