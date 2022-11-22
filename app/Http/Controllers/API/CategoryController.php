<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  DB::table('categories')->get();

        return response()->json([
            'success' => true,
            'message' => 'categories',
            'data' => $data
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
        try {
            $rules = [
                'category_name' => 'required',
            ];
            $validated = $request->validate($rules);
            Category::create($validated);
            return response()->json([
                'success' => true,
                'message' => 'add category success',
                'data' => $validated,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'add category failed'
            ], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = DB::table('categories')->where('id', '=', $id);
            if (!($category->get()->isEmpty())) {
                $category->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'delete category success'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'category not empty'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'delete category failed',
                'data' => $th
            ]);
        }
    }
}
