@extends('admin.layouts.master')
@section('title', 'Karyawan')

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
                        <a href="{{ route('admin.employee.index') }}">
                            <i class="fa fa-file-pdf"></i>
                            Karyawan
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-plus-circle"></i>
                        Tambah Data
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.employee.store') }}" enctype="multipart/form-data">
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
                                                <label for="nip">ID Karyawan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nip') is-invalid @enderror" name="nip" id="nip" value="{{ old('nip') }}" placeholder="Masukkan id karyawan">
                                                <div class="invalid-feedback" id="valid-nip">{{ $errors->first('nip') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Nama <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Masukkan nama">
                                                <div class="invalid-feedback" id="valid-name">{{ $errors->first('name') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="division">Divisi <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('division') is-invalid @enderror" name="division" id="division" value="{{ old('division') }}" placeholder="Masukkan divisi">
                                                <div class="invalid-feedback" id="valid-division">{{ $errors->first('division') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="join_date">Tanggal Masuk Kerja <sup class="text-danger">*</sup></label>
                                                <input type="date" class="form-control form-control-sm @error('join_date') is-invalid @enderror" name="join_date" id="join_date" value="{{ old('join_date') }}">
                                                <div class="invalid-feedback" id="valid-join_date">{{ $errors->first('join_date') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="email">Email <sup class="text-danger">*</sup></label>
                                                <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Masukkan email">
                                                <div class="invalid-feedback" id="valid-email">{{ $errors->first('email') }}</div>
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
                                                <label for="address">Alamat <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}" placeholder="Masukkan alamat">
                                                <div class="invalid-feedback" id="valid-address">{{ $errors->first('address') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="postcode">Kode Pos <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('postcode') is-invalid @enderror" name="postcode" id="postcode" value="{{ old('postcode') }}" placeholder="Masukkan kode pos">
                                                <div class="invalid-feedback" id="valid-postcode">{{ $errors->first('postcode') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="bank_name">Nama Bank <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('bank_name') is-invalid @enderror" name="bank_name" id="bank_name" value="{{ old('bank_name') }}" placeholder="Masukkan nama">
                                                <div class="invalid-feedback" id="valid-bank_name">{{ $errors->first('bank_name') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="account_number">No Rekening <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('account_number') is-invalid @enderror" name="account_number" id="account_number" value="{{ old('account_number') }}" placeholder="Masukkan nomor rekening">
                                                <div class="invalid-feedback" id="valid-account_number">{{ $errors->first('account_number') }}</div>
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