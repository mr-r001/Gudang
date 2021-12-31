<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Rack;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProductController extends Controller
{
    protected $customMessages = [
        'required'              => ':attribute harus diisi',
        'unique'                => 'This :attribute has already been taken.',
        'integer'               => ':Attribute must be a number.',
        'min'                   => ':Attribute must be at least :min.',
        'max'                   => ':Attribute may not be more than :max characters.',
        'exists'                => 'Not found.',
    ];

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Product::with('category', 'rack')->orderBy('updated_at', 'DESC')->get())
                ->addColumn('category', 'admin.product.category')
                ->addColumn('rack', 'admin.product.rack')
                ->addColumn('photo', 'admin.product.photo')
                ->addColumn('action', 'admin.product.action')
                ->rawColumns(['photo', 'category', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.product.index');
    }

    public function create()
    {
        $categories  = Category::orderBy('name')->get();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'code'                  => 'required|string',
            'name'                  => 'required|string',
            'unit'                  => 'required|string',
            'capital_price'         => 'required|string',
            'price'                 => 'required|string',
            'reseller_price'        => 'required|string',
            'stock'                 => 'required|string',
            'description'           => 'required|string',
            'category_id'           => 'required|integer',
            'material'              => 'required|string',
            'color'                 => 'required|string',
            'laminate'              => 'required|string',
            'length'                => 'required|string',
            'width'                 => 'required|string',
            'height'                => 'required|string',
            'weight'                => 'nullable|string',
        ], $this->customMessages);

        $data = new Product();
        $data->code                     = strip_tags(request()->post('code'));
        $data->name                     = strip_tags(request()->post('name'));
        $data->unit                     = strip_tags(request()->post('unit'));
        $data->capital_price            = strip_tags(request()->post('capital_price'));
        $data->price                    = strip_tags(request()->post('price'));
        $data->reseller_price           = strip_tags(request()->post('reseller_price'));
        $data->stock                    = strip_tags(request()->post('stock'));
        $data->description              = strip_tags(request()->post('description'));
        $data->category_id              = strip_tags(request()->post('category_id'));
        $data->material                 = strip_tags(request()->post('material'));
        $data->color                    = strip_tags(request()->post('color'));
        $data->laminate                 = strip_tags(request()->post('laminate'));
        $data->length                   = strip_tags(request()->post('length'));
        $data->width                    = strip_tags(request()->post('width'));
        $data->height                   = strip_tags(request()->post('height'));
        $data->weight                   = strip_tags(request()->post('weight'));

        if (request()->hasFile('photo')) {
            $image = request()->file('photo');
            $imageName = rand(1, 99999999999) . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/product');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(500, 580)->save($imagePath . '/' . $imageName);

            $data->photo = $imageName;
        } else {
            $data->photo = 'default.jpg';
        }
        $data->save();
        $id = $data->id;
        if ($id) {
            $data = Rack::findOrFail(request()->post('rack_id'));

            $data->update([
                'product_id'   => $id,
            ]);

            return redirect()->route('admin.product.index')->with('success', "Data berhasil ditambahkan!");
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::findOrFail($id);
        $categories  = Category::orderBy('name')->get();
        $rack = Product::with('rack')->get();

        return view('admin.product.edit', compact('data', 'categories', 'rack'));
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
        $data = Product::findOrFail($id);

        request()->validate([
            'code'                  => 'required|string',
            'name'                  => 'required|string',
            'unit'                  => 'required|string',
            'capital_price'         => 'required|string',
            'price'                 => 'required|string',
            'reseller_price'        => 'required|string',
            'stock'                 => 'required|string',
            'description'           => 'required|string',
            'category_id'           => 'required|integer',
            'material'              => 'required|string',
            'color'                 => 'required|string',
            'laminate'              => 'required|string',
            'length'                => 'required|string',
            'width'                 => 'required|string',
            'height'                => 'required|string',
            'weight'                => 'nullable|string',
        ], $this->customMessages);

        $data->code                     = strip_tags(request()->post('code'));
        $data->name                     = strip_tags(request()->post('name'));
        $data->unit                     = strip_tags(request()->post('unit'));
        $data->capital_price            = strip_tags(request()->post('capital_price'));
        $data->price                    = strip_tags(request()->post('price'));
        $data->reseller_price           = strip_tags(request()->post('reseller_price'));
        $data->stock                    = strip_tags(request()->post('stock'));
        $data->description              = strip_tags(request()->post('description'));
        $data->category_id              = strip_tags(request()->post('category_id'));
        $data->material                 = strip_tags(request()->post('material'));
        $data->color                    = strip_tags(request()->post('color'));
        $data->laminate                 = strip_tags(request()->post('laminate'));
        $data->length                   = strip_tags(request()->post('length'));
        $data->width                    = strip_tags(request()->post('width'));
        $data->height                   = strip_tags(request()->post('height'));
        $data->weight                   = strip_tags(request()->post('weight'));

        if (request()->hasFile('photo')) {
            if ($data->photo <> 'default.jpg') {
                $fileName = public_path() . '/img/product/' . $data->photo;
                File::delete($fileName);
            }

            $image = request()->file('photo');
            $imageName = rand(1, 99999999999) . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/product');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(500, 500)->save($imagePath . '/' . $imageName);

            $data->photo = $imageName;
        }
        $data->save();
        $productId = $data->id;
        if (request()->post('rack_id')) {
            $data = Rack::where('product_id', $productId);

            $result = $data->update([
                'product_id'   => NULL,
            ]);

            if ($result) {
                $data = Rack::findOrFail(request()->post('rack_id'));

                $data->update([
                    'product_id'   => $productId,
                ]);
            }
        }
        return redirect()->route('admin.product.index')->with('success', "Data berhasil ditambahkan!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Employee::destroy($id);

        return response()->json($item);
    }
    public function search()
    {
        $id = $_GET['id'];
        $rack = Rack::where('category_id', $id)->where('product_id', NULL)->get();

        return response()->json($rack);
    }

    public function qrcode($id)
    {

        $qrcode = $id;

        return view('admin.product.pdf', compact('qrcode'));
    }
}
