@extends('admin.layouts.master')
@section('title', 'Karyawan')

@section('content')
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
                        <a href="{{ route('admin.employee.index') }}">
                            <i class="fa fa-file-pdf"></i>
                            Karyawan
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-edit"></i>
                        Edit
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.employee.update', $data->id) }}" enctype="multipart/form-data">
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
                                                <label for="nip">ID Karyawan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nip') is-invalid @enderror" name="nip" id="nip" value="@error('nip'){{ old('nip') }}@else{{ $data->nip }}@enderror" placeholder="Masukkan id karyawan">
                                                <div class="invalid-feedback" id="valid-nip">{{ $errors->first('nip') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Nama <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" id="name" value="@error('name'){{ old('name') }}@else{{ $data->name }}@enderror" placeholder="Masukkan nama">
                                                <div class="invalid-feedback" id="valid-name">{{ $errors->first('name') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="division">Divisi <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('division') is-invalid @enderror" name="division" id="division" value="@error('division'){{ old('division') }}@else{{ $data->division }}@enderror" placeholder="Masukkan divisi">
                                                <div class="invalid-feedback" id="valid-division">{{ $errors->first('division') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="join_date">Tanggal Masuk Kerja <sup class="text-danger">*</sup></label>
                                                <input type="date" class="form-control form-control-sm @error('join_date') is-invalid @enderror" name="join_date" id="join_date" value="@error('join_date'){{ old('join_date') }}@else{{ $data->join_date }}@enderror">
                                                <div class="invalid-feedback" id="valid-join_date">{{ $errors->first('join_date') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="email">Email <sup class="text-danger">*</sup></label>
                                                <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" id="email" value="@error('email'){{ old('email') }}@else{{ $data->email }}@enderror" placeholder="Masukkan email">
                                                <div class="invalid-feedback" id="valid-email">{{ $errors->first('email') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="phone">No Hp <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror" name="phone" id="phone" value="@error('phone'){{ old('phone') }}@else{{ $data->phone }}@enderror" placeholder="Masukkan nomor handphone">
                                                <div class="invalid-feedback" id="valid-phone">{{ $errors->first('phone') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="address">Alamat <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('address') is-invalid @enderror" name="address" id="address" value="@error('address'){{ old('address') }}@else{{ $data->address }}@enderror" placeholder="Masukkan alamat">
                                                <div class="invalid-feedback" id="valid-address">{{ $errors->first('address') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="postcode">Kode Pos <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('postcode') is-invalid @enderror" name="postcode" id="postcode" value="@error('postcode'){{ old('postcode') }}@else{{ $data->postcode }}@enderror" placeholder="Masukkan kode pos">
                                                <div class="invalid-feedback" id="valid-postcode">{{ $errors->first('postcode') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="bank_name">Nama Bank <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('bank_name') is-invalid @enderror" name="bank_name" id="bank_name" value="@error('bank_name'){{ old('bank_name') }}@else{{ $data->bank_name }}@enderror" placeholder="Masukkan nama">
                                                <div class="invalid-feedback" id="valid-bank_name">{{ $errors->first('bank_name') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="account_number">No Rekening <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('account_number') is-invalid @enderror" name="account_number" id="account_number" value="@error('account_number'){{ old('account_number') }}@else{{ $data->account_number }}@enderror" placeholder="Masukkan nomor rekening">
                                                <div class="invalid-feedback" id="valid-account_number">{{ $errors->first('account_number') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <a href="{{ route('admin.employee.index') }}" class="btn btn-link float-left">
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
            function filePreview2(input) {
                if(input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#book_cover_url + img').remove();
                        $('#book_cover_url').after('<img src="' + e.target.result + '" class="img-thumbnail">');
                    };
                    reader.readAsDataURL(input.files[0]);
                };
            }
            $('#book_cover_url').change(function() {
                filePreview2(this);
                $('#valid-book_cover_url').html('');
            });
            $('form').submit(function() {
                $('#btn-submit').html('<i class="fas fa-cog fa-spin"></i> Saving...').attr("disabled", true);
            });
        })
    </script>
@endsection