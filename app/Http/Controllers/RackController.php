<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rack;
use Illuminate\Http\Request;

class RackController extends Controller
{
    protected $customMessages = [
        'required' => 'Please input the :attribute.',
        'unique' => 'This :attribute has already been taken.',
        'max' => ':Attribute may not be more than :max characters.',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Rack::with('category')->orderBy('position', 'ASC')->get())
                ->addColumn('category', 'admin.rack.category')
                ->addColumn('action', 'admin.rack.action')
                ->rawColumns(['category', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        $category  = Category::orderBy('name')->get();
        return view('admin.rack.index', compact('category'));
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
        $data = Rack::create([
            'category_id'   => strip_tags(request()->post('category_id')),
            'position'      => strip_tags(request()->post('position')),
        ]);

        return response()->json($data);
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
        $data = Rack::findOrFail($id);

        return response()->json($data);
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
        $data = Rack::findOrFail($id);

        $data->update([
            'category_id'   => strip_tags(request()->post('category_id')),
            'position'      => strip_tags(request()->post('position')),
        ]);

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Rack::destroy($id);

        return response()->json($data);
    }
}
