<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Ekspedisi;
use App\Models\Pengirim;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(
                Cart::with('product')->select('id', 'product_id', DB::raw('count(*) as total'))
                    ->groupBy('product_id')
                    ->orderBy('created_at', 'ASC')
                    ->get()
            )
                ->addColumn('product', 'admin.cart.product')
                ->addColumn('action', 'admin.cart.action')
                ->rawColumns(['product', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resellers  = Pengirim::orderBy('name')->get();
        $ekspedisi  = Ekspedisi::orderBy('name')->get();
        return view('admin.cart.send', compact('resellers', 'ekspedisi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $today = date("d M Y");
        $ekspedisi = Ekspedisi::findOrFail(request()->post('id_ekspedisi'));
        $pengirim  = Pengirim::findOrFail(request()->post('id_pengirim'));

        $data = [
            'date'              => $today,
            'ekspedisi'         => $ekspedisi->photo,
            'nama_pengirim'     => $pengirim->name,
            'no_pengirim'       => $pengirim->phone,
            'alamat_pengirim'   => $pengirim->address,
            'logo_pengirim'     => $pengirim->logo,
            'nama_penerima'     => request()->post('name'),
            'no_penerima'       => request()->post('phone'),
            'alamat_penerima'   => request()->post('address'),
            'catatan'           => request()->post('note'),
        ];

        Cart::where('user_id', auth()->user()->id)->delete();

        return view('admin.cart.show')->with($data);
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
        $item = Cart::findOrFail($id);
        $product_id = $item->product_id;

        $product = Product::findOrFail($product_id);
        $product->stock = $product->stock + $item->qty;
        $product->save();

        $itemDelete = $item->delete();

        return response()->json($itemDelete);
    }

    public function search()
    {
        $id = $_GET['id'];
        $pengirim = Pengirim::where('id', $id)->get();

        return response()->json($pengirim);
    }
}
