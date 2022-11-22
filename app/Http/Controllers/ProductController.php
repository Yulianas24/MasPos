<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('addProduct', [
            'title' => 'AddProduct',
            'categories' => Category::all(),
        ]);
    }

    public function showCart()
    {

        return view('cart', [
            'title' => 'cart',
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
        try {
            $rules = [
                'product_name' => 'required',
                'image' => 'image|file|max:2048',
                'price' => 'required',
                'category_id' => 'required',
            ];

            $validated = $request->validate($rules);
            if ($request->file('image')) {

                $validated['image'] = $request->file('image')->store('product_image');
            }
            Product::create($validated);

            $request->file('image')->store('public/product_image');

            return redirect('/')->with('success', 'Add product successfully');
        } catch (\Throwable $th) {
            return redirect('/')->with('error', 'Add product failed, please try again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request)
    {
        if ($request->totalBill == 0) {
            return redirect('/')->with('error', 'Select product first');
        }
        $transaction = new Transaction;
        $transaction->user_id = $request->user_id;
        $transaction->totalBill = $request->totalBill;

        $transaction->save();

        return view('success', [
            'title' => 'success',
            'bill' => $request->totalBill
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::where('product_name', '=', $product->product_name)->delete();
        Storage::delete($product->image);
        Storage::delete('public/' . $product->image);
        return redirect('/');
    }
}
