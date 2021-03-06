<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Rack;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Rack::with('category', 'product')->get();
        $data = $category->groupBy('category.name');
        // dd($data);
        return view('admin.transaction.index', compact('data'));
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
        //
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
    public function destroy($id)
    {
        //
    }

    public function addCart()
    {
        $product_id         = $_GET['id'];
        $user_id            = auth()->user()->id;

        $product            = Product::findOrFail($product_id);
        if ($product->stock == 0) {
            return response()->json([
                'message' => 'Stok kosong',
            ]);
        } else {
            $product->stock     = $product->stock - 1;
            $save               = $product->save();
            if ($save) {
                $data = new Cart();
                $data->user_id           = $user_id;
                $data->product_id        = $product_id;
                $data->save();

                return response()->json($product);
            }
        }
    }
}
