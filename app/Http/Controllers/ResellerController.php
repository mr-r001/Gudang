<?php

namespace App\Http\Controllers;

use App\Models\Pengirim;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ResellerController extends Controller
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
            return datatables()->of(Pengirim::orderBy('updated_at', 'DESC')->get())
                ->addColumn('logo', 'admin.reseller.photo')
                ->addColumn('action', 'admin.reseller.action')
                ->rawColumns(['logo', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.reseller.index');
    }

    public function create()
    {
        return view('admin.reseller.create');
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
            'phone'                 => 'required|string',
            'address'               => 'required|string',
        ], $this->customMessages);

        $data = new Pengirim();
        $data->code                     = strip_tags(request()->post('code'));
        $data->name                     = strip_tags(request()->post('name'));
        $data->phone                    = strip_tags(request()->post('phone'));
        $data->address                  = strip_tags(request()->post('address'));

        if (request()->hasFile('photo')) {
            $image = request()->file('photo');
            $imageName = rand(1, 99999999999) . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/reseller');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(500, 580)->save($imagePath . '/' . $imageName);

            $data->logo = $imageName;
        } else {
            $data->logo = 'default.jpg';
        }
        $data->save();

        return redirect()->route('admin.reseller.index')->with('success', "Data berhasil ditambahkan!");
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
        $data = Pengirim::findOrFail($id);

        return view('admin.reseller.edit', compact('data'));
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
        $data = Pengirim::findOrFail($id);

        request()->validate([
            'code'                  => 'required|string',
            'name'                  => 'required|string',
            'phone'                 => 'required|string',
            'address'               => 'required|string',
        ], $this->customMessages);

        $data->code                     = strip_tags(request()->post('code'));
        $data->name                     = strip_tags(request()->post('name'));
        $data->phone                    = strip_tags(request()->post('phone'));
        $data->address                  = strip_tags(request()->post('address'));

        if (request()->hasFile('photo')) {
            if ($data->logo <> 'default.jpg') {
                $fileName = public_path() . '/img/resller/' . $data->logo;
                File::delete($fileName);
            }

            $image = request()->file('photo');
            $imageName = rand(1, 99999999999) . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/reseller');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(500, 580)->save($imagePath . '/' . $imageName);

            $data->logo = $imageName;
        }
        $data->save();

        return redirect()->route('admin.reseller.index')->with('success', "Data berhasil di edit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Pengirim::findOrFail($id);

        if ($item->logo <> 'default.jpg') {
            $fileName2 = public_path() . '/img/reseller/' . $item->logo;
            File::delete($fileName2);
        }

        $itemDelete = $item->delete();

        return response()->json($itemDelete);
    }
}
