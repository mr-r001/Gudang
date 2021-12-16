<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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
            return datatables()->of(Employee::orderBy('updated_at', 'DESC')->get())
                ->addColumn('action', 'admin.employee.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.employee.index');
    }

    public function create()
    {
        return view('admin.employee.create');
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
            'nip'                   => 'required|string',
            'name'                  => 'required|string',
            'division'              => 'required|string',
            'join_date'             => 'required|date',
            'email'                 => 'required|string',
            'phone'                 => 'required|string',
            'address'               => 'required|string',
            'postcode'              => 'required|string',
            'account_number'        => 'required|string',
            'bank_name'             => 'required|string',
        ], $this->customMessages);

        $data = new Employee();
        $data->nip                      = strip_tags(request()->post('nip'));
        $data->name                     = strip_tags(request()->post('name'));
        $data->division                 = strip_tags(request()->post('division'));
        $data->join_date                = request()->post('join_date');
        $data->email                    = strip_tags(request()->post('email'));
        $data->phone                    = strip_tags(request()->post('phone'));
        $data->address                  = strip_tags(request()->post('address'));
        $data->postcode                 = strip_tags(request()->post('postcode'));
        $data->account_number           = strip_tags(request()->post('account_number'));
        $data->bank_name                = strip_tags(request()->post('bank_name'));
        $data->save();

        return redirect()->route('admin.employee.index')->with('success', "Data berhasil ditambahkan!");
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
        $data = Employee::findOrFail($id);

        return view('admin.employee.edit', compact('data'));
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
        $data = Employee::findOrFail($id);

        request()->validate([
            'nip'                   => 'required|string',
            'name'                  => 'required|string',
            'division'              => 'required|string',
            'join_date'             => 'required|date',
            'email'                 => 'required|string',
            'phone'                 => 'required|string',
            'address'               => 'required|string',
            'postcode'              => 'required|string',
            'account_number'        => 'required|string',
            'bank_name'             => 'required|string',
        ], $this->customMessages);

        $data->nip                      = strip_tags(request()->post('nip'));
        $data->name                     = strip_tags(request()->post('name'));
        $data->division                 = strip_tags(request()->post('division'));
        $data->join_date                = request()->post('join_date');
        $data->email                    = strip_tags(request()->post('email'));
        $data->phone                    = strip_tags(request()->post('phone'));
        $data->address                  = strip_tags(request()->post('address'));
        $data->postcode                 = strip_tags(request()->post('postcode'));
        $data->account_number           = strip_tags(request()->post('account_number'));
        $data->bank_name                = strip_tags(request()->post('bank_name'));

        $data->save();

        return redirect()->route('admin.employee.index')->with('success', "Data berhasil di edit!");
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
}
