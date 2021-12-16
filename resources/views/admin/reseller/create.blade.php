@extends('admin.layouts.master')
@section('title', 'Toko Pengirim')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Data</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.reseller.index') }}">
                            <i class="fa fa-file-pdf"></i>
                            Toko Pengirim
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-plus-circle"></i>
                        Tambah Data
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.reseller.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Data</h4>
                                </div>
                                <div class="card-body">
                                    <div class="text-danger" id="valid-type">{{ $errors->first('type') }}</div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="code">Kode Pengirim <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('code') is-invalid @enderror" name="code" id="code" value="{{ old('code') }}" placeholder="Masukkan kode pengirim">
                                                <div class="invalid-feedback" id="valid-code">{{ $errors->first('code') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Nama Pengirim <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Masukkan nama pengirim">
                                                <div class="invalid-feedback" id="valid-name">{{ $errors->first('name') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="phone">No Hp <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Masukkan nomor handphone">
                                                <div class="invalid-feedback" id="valid-phone">{{ $errors->first('phone') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="address">Alamat Pengirim <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}" placeholder="Masukkan alamat pengirim">
                                                <div class="invalid-feedback" id="valid-address">{{ $errors->first('address') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="photo">Logo Pengirim <sup class="text-danger">*</sup></label>
                                                <input type="file" class="form-control form-control-sm @error('photo') is-invalid @enderror" name="photo" id="photo" value="{{ old('photo') }}">
                                                <div class="invalid-feedback" id="valid-photo">{{ $errors->first('photo') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
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
                </form>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/js/jquery.mask.min.js') }}"></script>
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
            function filePreview2(input) {
                if(input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#photo + img').remove();
                        $('#photo').after('<br><img src="' + e.target.result + '" class="img-thumbnail" width="100" height="100">');
                    };
                    reader.readAsDataURL(input.files[0]);
                };
            }
            $('body').on('change', '#kecamatan', function() {
                var value = $(this).val();
                if (value == 'Lainnya') {
                    $("#kecamatan_").attr("readonly", false); 
                } else {
                    $("#kecamatan_").attr("readonly", true); 
                }
            })
            $('#photo').change(function() {
                filePreview2(this);
                $('#valid-photo').html('');
            });
            $('form').submit(function() {
                $('#btn-submit').html('<i class="fas fa-cog fa-spin"></i> Saving...').attr("disabled", true);
            });
        })
    </script>
@endsection