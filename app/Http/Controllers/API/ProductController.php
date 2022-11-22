<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
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

        return response()->json([
            'success' => true,
            'message' => 'products',
            'data' => $products
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'image' => 'required|image|file|max:2048',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'add product failed',
                'data' => $validator->errors()
            ], 401);
        } else {
            $validated = [
                'product_name' => $request->product_name,
                'price' => $request->price,
                'category_id' => $request->category_id,
            ];
            if ($request->file('image')) {
                $validated['image'] = $request->file('image')->store('product_image');
            }
            try {
                Product::create($validated);
                $request->file('image')->store('/public/product_image');
                return response()->json([
                    'success' => true,
                    'message' => 'add product success'
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'success' => false,
                    'message' => 'add product failed'
                ], 401);
            }
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
    public function destroy($product)
    {
        $prod = Product::where('product_name', '=', $product);
        if (!$prod->get()->isEmpty()) {

            Storage::delete($prod->first()->image);
            Storage::delete('public/' . $prod->first()->image);
            Product::where('product_name', '=', $product)->delete();
            return response()->json([
                'success' => true,
                'message' => 'delete product success'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'delete product failed'
            ], 401);
        }
    }
}
