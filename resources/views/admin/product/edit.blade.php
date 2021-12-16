@extends('admin.layouts.master')
@section('title', 'Data Produk')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
    <!-- Modal -->
 
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.product.index') }}">
                            <i class="fa fa-file-pdf"></i>
                            Data Produk
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-edit"></i>
                        Edit
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.product.update', $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Data</h4>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" id="book_id" value="{{ $data->id }}">
                                    <input type="hidden" name="type" value="e-book">
                                    <div class="text-danger" id="valid-type">{{ $errors->first('type') }}</div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="code">Kode SKU <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('code') is-invalid @enderror" name="code" id="code" value="@error('code'){{ old('code') }}@else{{ $data->code }}@enderror" placeholder="Masukkan Kode SKU">
                                                <div class="invalid-feedback" id="valid-code">{{ $errors->first('code') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Nama Produk <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" id="name" value="@error('name'){{ old('name') }}@else{{ $data->name }}@enderror" placeholder="Masukkan Nama Produk">
                                                <div class="invalid-feedback" id="valid-name">{{ $errors->first('name') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="unit">Satuan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('unit') is-invalid @enderror" name="unit" id="unit" value="@error('unit'){{ old('unit') }}@else{{ $data->unit }}@enderror" placeholder="Masukkan Satuan">
                                                <div class="invalid-feedback" id="valid-unit">{{ $errors->first('unit') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="capital_price">Harga Modal <sup class="text-danger">*</sup></label>
                                                <input type="number" class="form-control form-control-sm @error('capital_price') is-invalid @enderror" name="capital_price" id="capital_price" value="@error('capital_price'){{ old('capital_price') }}@else{{ $data->capital_price }}@enderror" placeholder="Masukkan Harga Modal">
                                                <div class="invalid-feedback" id="valid-capital_price">{{ $errors->first('capital_price') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="price">Harga Umum <sup class="text-danger">*</sup></label>
                                                <input type="number" class="form-control form-control-sm @error('price') is-invalid @enderror" name="price" id="price" value="@error('price'){{ old('price') }}@else{{ $data->price }}@enderror" placeholder="Masukkan Harga Umum">
                                                <div class="invalid-feedback" id="valid-price">{{ $errors->first('price') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="reseller_price">Harga Reseller <sup class="text-danger">*</sup></label>
                                                <input type="number" class="form-control form-control-sm @error('reseller_price') is-invalid @enderror" name="reseller_price" id="reseller_price" value="@error('reseller_price'){{ old('reseller_price') }}@else{{ $data->reseller_price }}@enderror" placeholder="Masukkan Harga Reseller">
                                                <div class="invalid-feedback" id="valid-reseller_price">{{ $errors->first('reseller_price') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="stock">Stok <sup class="text-danger">*</sup></label>
                                                <input type="number" class="form-control form-control-sm @error('stock') is-invalid @enderror" name="stock" id="stock" value="@error('stock'){{ old('stock') }}@else{{ $data->stock }}@enderror" placeholder="Masukkan Stok">
                                                <div class="invalid-feedback" id="valid-stock">{{ $errors->first('stock') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="description">Deskripsi <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('description') is-invalid @enderror" name="description" id="description" value="@error('description'){{ old('description') }}@else{{ $data->description }}@enderror" placeholder="Masukkan Stok">
                                                <div class="invalid-feedback" id="valid-description">{{ $errors->first('description') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="category_id">Kategori <sup class="text-danger">*</sup></label>
                                                <select class="select2 form-control form-control-sm @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                                    <option value="" selected disabled>-- Pilih Kategori --</option>
                                                        @foreach ($categories as $category )
                                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id || $data->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="rack_id">Letak di Rak <sup class="text-danger">*</sup></label>
                                                <select class="select2 form-control form-control-sm @error('rack_id') is-invalid @enderror" name="rack_id" id="rack_id">
                                                    <option value="" selected disabled>{{ $rack[0]['rack'][0]->position }}</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <label for="material">Bahan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('material') is-invalid @enderror" name="material" id="material" value="@error('material'){{ old('material') }}@else{{ $data->material }}@enderror" placeholder="Masukkan Bahan">
                                                <div class="invalid-feedback" id="valid-material">{{ $errors->first('material') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <label for="color">Warna/Desain <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('color') is-invalid @enderror" name="color" id="color" value="@error('color'){{ old('color') }}@else{{ $data->color }}@enderror" placeholder="Masukkan Warna">
                                                <div class="invalid-feedback" id="valid-color">{{ $errors->first('color') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <label for="laminate">Laminasi <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('laminate') is-invalid @enderror" name="laminate" id="laminate" value="@error('laminate'){{ old('laminate') }}@else{{ $data->laminate }}@enderror" placeholder="Masukkan Laminasi">
                                                <div class="invalid-feedback" id="valid-laminate">{{ $errors->first('laminate') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <label for="length">Panjang <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('length') is-invalid @enderror" name="length" id="length" value="@error('length'){{ old('length') }}@else{{ $data->length }}@enderror" placeholder="Masukkan Panjang">
                                                <div class="invalid-feedback" id="valid-length">{{ $errors->first('length') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <label for="width">Lebar <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('width') is-invalid @enderror" name="width" id="width" value="@error('width'){{ old('width') }}@else{{ $data->width }}@enderror" placeholder="Masukkan Lebar">
                                                <div class="invalid-feedback" id="valid-width">{{ $errors->first('width') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <label for="height">Tinggi <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('height') is-invalid @enderror" name="height" id="height" value="@error('height'){{ old('height') }}@else{{ $data->height }}@enderror" placeholder="Masukkan Tinggi">
                                                <div class="invalid-feedback" id="valid-height">{{ $errors->first('height') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="weight">Berat (gram/kg)</label>
                                                <input type="text" class="form-control form-control-sm @error('weight') is-invalid @enderror" name="weight" id="weight" value="@error('weight'){{ old('weight') }}@else{{ $data->weight }}@enderror" placeholder="Masukkan Berat">
                                                <div class="invalid-feedback" id="valid-weight">{{ $errors->first('weight') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="photo">Foto Produk <sup class="text-danger">max : 2MB</sup></label>
                                                <input type="file" class="form-control-file @error('photo') is-invalid @enderror" id="photo" name="photo">
                                                <br>
                                                <img src="{{ asset('/img/product/' . $data->photo) }}" id="thumbnail" class="img-thumbnail" width="100" height="100">
                                                <div class="invalid-feedback" id="valid-photo">{{ $errors->first('photo') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <a href="{{ route('admin.product.index') }}" class="btn btn-link float-left">
                                                    <i class="fas fa-arrow-left"></i>
                                                    Kembali
                                                </a>
                                                <button type="submit" class="btn btn-primary btn-round float-right" id="btn-submit">
                                                    <i class="fas fa-check"></i>
                                                    Simpan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('backend/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Setup AJAX CSRF
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.select2').on('select2:selecting', function() {
                $(this).removeClass('is-invalid');
            });
            
            $('body').on('keyup', '#name', function() {
                var test = $(this).val();
                if (test == '') {
                    $(this).removeClass('is-valid is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            })
            $('body').on('change', '#category_id', function() {
                var id = $(this).val();
                ajaxurl = '{{ route("admin.product.search", "id") }}'
                $.ajax({
                    type: 'GET',
                    url: ajaxurl,
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        $('#rack_id').empty()
                        $('#rack_id').append('<option value="" selected disabled>-- Pilih Rak --</option>')
                        $.each(data, function (i,data) {
                            $('#rack_id').append(new Option(data.position, data.id))
                        })
                    },
                    error: function(data) {
                        console.log(data)
                    }
                });
            })
            $('form').submit(function() {
                $('#btn-submit').html('<i class="fas fa-cog fa-spin"></i> Saving...').attr("disabled", true);
            });
        })
    </script>
@endsection