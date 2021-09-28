<?php

namespace App\Http\Controllers;

use App\Models\BiodataWNI;
use App\Models\Kecamatan;
use App\Models\Korupsi;
use App\Models\TIKTerdakwa;
use Illuminate\Http\Request;

class KorupsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $customMessages = [
        'required'              => ':attribute harus diisi',
        'unique'                => 'This :attribute has already been taken.',
        'integer'               => ':Attribute must be a number.',
        'min'                   => ':Attribute must be at least :min.',
        'max'                   => ':Attribute may not be more than :max characters.',
        'exists'                => 'Not found.',
        'biodata.required'      => 'Pilih Informasi Terdakwa.',
        'kecamatan.required'    => 'Pilih Kecamatan.',
    ];

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Korupsi::with('biodata')
                ->orderBy('updated_at', 'DESC')
                ->get())
                ->addColumn('biodata', 'admin.korupsi.biodata')
                ->addColumn('action', 'admin.korupsi.action')
                ->rawColumns(['biodata', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.korupsi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $biodata = TIKTerdakwa::orderBy('nama')->get();
        $kecamatan = Kecamatan::orderBy('name')->get();

        return view('admin.korupsi.create', compact('biodata', 'kecamatan'));
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
            'tgl'                   => 'nullable|date',
            'biodata'               => 'required|integer',
            'kecamatan'             => 'required|integer',
            'locus'                 => 'required|date',
            'pasal'                 => 'nullable|string',
            'penyelidikan'          => 'nullable|string',
            'tgl_surat_kejaksaan'   => 'nullable|date',
            'nomor_surat_kejaksaan' => 'nullable|string',
            'tgl_surat_polri'       => 'nullable|date',
            'nomor_surat_polri'     => 'nullable|string',
            'penuntutan'            => 'nullable|string',
            'eksekusi'              => 'nullable|string',
            'upaya'                 => 'nullable|string',
            'keterangan'            => 'nullable|string',
        ], $this->customMessages);

        $data = new Korupsi();
        $data->tgl                      = request()->post('tgl');
        $data->biodata_id               = strip_tags(request()->post('biodata'));
        $data->kecamatan_id             = strip_tags(request()->post('kecamatan'));
        $data->locus                    = request()->post('locus');
        $data->pasal                    = strip_tags(request()->post('pasal'));
        $data->penyelidikan             = strip_tags(request()->post('penyelidikan'));
        $data->tgl_surat_kejaksaan      = request()->post('tgl_surat_kejaksaan');
        $data->nomor_surat_kejaksaan    = strip_tags(request()->post('nomor_surat_kejaksaan'));
        $data->tgl_surat_polri          = request()->post('tgl_surat_polri');
        $data->nomor_surat_polri        = strip_tags(request()->post('nomor_surat_polri'));
        $data->penuntutan               = strip_tags(request()->post('penuntutan'));
        $data->eksekusi                 = strip_tags(request()->post('eksekusi'));
        $data->upaya                    = strip_tags(request()->post('upaya'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));
        $data->save();

        return redirect()->route('admin.korupsi.index')->with('success', "Data berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Korupsi::findOrFail($id);
        $kecamatan = Kecamatan::orderBy('name')->get();

        return view('admin.korupsi.show', compact('data', 'kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Korupsi::findOrFail($id);
        $biodatas = TIKTerdakwa::orderBy('nama')->get();
        $kecamatans = Kecamatan::orderBy('name')->get();

        return view('admin.korupsi.edit', compact('data', 'biodatas', 'kecamatans'));
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
        $data = Korupsi::findOrFail($id);
        request()->validate([
            'tgl'                   => 'nullable|date',
            'biodata'               => 'required|integer',
            'kecamatan'             => 'required|integer',
            'locus'                 => 'required|date',
            'pasal'                 => 'nullable|string',
            'penyelidikan'          => 'nullable|string',
            'tgl_surat_kejaksaan'   => 'nullable|date',
            'nomor_surat_kejaksaan' => 'nullable|string',
            'tgl_surat_polri'       => 'nullable|date',
            'nomor_surat_polri'     => 'nullable|string',
            'penuntutan'            => 'nullable|string',
            'eksekusi'              => 'nullable|string',
            'upaya'                 => 'nullable|string',
            'keterangan'            => 'nullable|string',
        ], $this->customMessages);

        $data->tgl                      = request()->post('tgl');
        $data->biodata_id               = strip_tags(request()->post('biodata'));
        $data->kecamatan_id             = strip_tags(request()->post('kecamatan'));
        $data->locus                    = request()->post('locus');
        $data->pasal                    = strip_tags(request()->post('pasal'));
        $data->penyelidikan             = strip_tags(request()->post('penyelidikan'));
        $data->tgl_surat_kejaksaan      = request()->post('tgl_surat_kejaksaan');
        $data->nomor_surat_kejaksaan    = strip_tags(request()->post('nomor_surat_kejaksaan'));
        $data->tgl_surat_polri          = request()->post('tgl_surat_polri');
        $data->nomor_surat_polri        = strip_tags(request()->post('nomor_surat_polri'));
        $data->penuntutan               = strip_tags(request()->post('penuntutan'));
        $data->eksekusi                 = strip_tags(request()->post('eksekusi'));
        $data->upaya                    = strip_tags(request()->post('upaya'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));
        $data->save();

        return redirect()->route('admin.korupsi.index')->with('success', "Data berhasil di edit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Korupsi::destroy($id);

        return response()->json($data);
    }

    public function filter()
    {
        return view('admin.korupsi.filter');
    }

    public function download(Request $request)
    {
        $month = request()->post('bulan');
        if ($month === 'Januari') {
            $month = '01';
        } else if ($month === 'Februari') {
            $month = '02';
        } else if ($month === 'Maret') {
            $month = '03';
        } else if ($month === 'April') {
            $month = '04';
        } else if ($month === 'Mei') {
            $month = '05';
        } else if ($month === 'Juni') {
            $month = '06';
        } else if ($month === 'Juli') {
            $month = '07';
        } else if ($month === 'Agustus') {
            $month = '08';
        } else if ($month === 'September') {
            $month = '09';
        } else if ($month === 'Oktober') {
            $month = '10';
        } else if ($month === 'November') {
            $month = '11';
        } else if ($month === 'Desember') {
            $month = '12';
        }
        $year = request()->post('tahun');
        $data = Korupsi::with('biodata')->whereYear('tgl', '=', $year)
            ->whereMonth('tgl', '=', $month)
            ->get();

        return view('admin.korupsi.show', compact('data', 'month', 'year'));
    }
}
