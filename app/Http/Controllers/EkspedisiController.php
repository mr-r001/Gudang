<?php

namespace App\Http\Controllers;

use App\Models\Ekspedisi;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class EkspedisiController extends Controller
{
    protected $customMessages = [
        'required'              => ':attribute harus diisi',
        'unique'                => 'This :attribute has already been taken.',
        'integer'               => ':Attribute must be a number.',
        'min'                   => ':Attribute must be at least :min.',
        'max'                   => ':Attribute may not be more than :max characters.',
        'exists'                => 'Not found.',
        'kecamatan.required'    => 'Pilih Kecamatan.',
    ];

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Ekspedisi::orderBy('updated_at', 'DESC')->get())
                ->addColumn('photo', 'admin.ekspedisi.photo')
                ->addColumn('action', 'admin.ekspedisi.action')
                ->rawColumns(['photo', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.ekspedisi.index');
    }

    public function create()
    {
        return view('admin.ekspedisi.create');
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
            'name'                  => 'required|string',
        ], $this->customMessages);

        $data = new Ekspedisi();
        $data->name                     = strip_tags(request()->post('name'));

        if (request()->hasFile('photo')) {
            $image = request()->file('photo');
            $imageName = rand(1, 99999999999) . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/ekspedisi');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(500, 580)->save($imagePath . '/' . $imageName);

            $data->photo = $imageName;
        } else {
            $data->photo = 'default.jpg';
        }
        $data->save();

        return redirect()->route('admin.ekspedisi.index')->with('success', "Data berhasil ditambahkan!");
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
        $data = Ekspedisi::findOrFail($id);

        return view('admin.ekspedisi.edit', compact('data'));
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
        $data = Ekspedisi::findOrFail($id);
        request()->validate([
            'name'                  => 'required|string',
        ], $this->customMessages);

        $data->name                 = strip_tags(request()->post('name'));

        if (request()->hasFile('photo')) {
            if ($data->photo <> 'default.jpg') {
                $fileName = public_path() . '/img/ekspedisi/' . $data->photo;
                File::delete($fileName);
            }

            $image = request()->file('photo');
            $imageName = rand(1, 99999999999) . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/ekspedisi');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(500, 580)->save($imagePath . '/' . $imageName);

            $data->photo = $imageName;
        }
        $data->save();

        return redirect()->route('admin.ekspedisi.index')->with('success', "Data berhasil di edit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Ekspedisi::findOrFail($id);

        if ($item->photo <> 'default.jpg') {
            $fileName2 = public_path() . '/img/ekspedisi/' . $item->photo;
            File::delete($fileName2);
        }

        $itemDelete = $item->delete();

        return response()->json($itemDelete);
    }
}
