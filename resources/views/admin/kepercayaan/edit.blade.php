@extends('admin.layouts.master')
@section('title', 'Edit Pengawasan Aliran Kepercayaan Masyarakat')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <!-- Modal -->
 
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Pengawasan Aliran Kepercayaan Masyarakat</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.kepercayaan.index') }}">
                            <i class="fa fa-file-pdf"></i>
                            Pengawasan Aliran Kepercayaan Masyarakat
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-edit"></i>
                        Edit
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.kepercayaan.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="id" value="{{ $data->id }}">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Pengawasan Aliran Kepercayaan Masyarakat</h4>
                                </div>
                                <div class="card-body">
                                    <div class="text-danger" id="valid-type">{{ $errors->first('type') }}</div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tgl">Tanggal <sup class="text-danger">*</sup></label>
                                                <input type="date" class="form-control form-control-sm @error('tgl') is-invalid @enderror" name="tgl" id="tgl" value="@error('tgl'){{ old('tgl') }}@else{{ $data->tgl }}@enderror">
                                                <div class="invalid-feedback" id="valid-tgl">{{ $errors->first('tgl') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama">Nama Aliran Kepercayaan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" name="nama" id="nama" value="@error('nama'){{ old('nama') }}@else{{ $data->nama }}@enderror" placeholder="Masukkan Nama Aliran Kepercayaan">
                                                <div class="invalid-feedback" id="valid-nama">{{ $errors->first('nama') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="pimpinan">Nama Pimpinan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('pimpinan') is-invalid @enderror" name="pimpinan" id="pimpinan" value="@error('pimpinan'){{ old('pimpinan') }}@else{{ $data->pimpinan }}@enderror" placeholder="Masukkan Nama pimpinan">
                                                <div class="invalid-feedback" id="valid-pimpinan">{{ $errors->first('pimpinan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="alamat">Alamat <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="@error('alamat'){{ old('alamat') }}@else{{ $data->alamat }}@enderror">
                                                <div class="invalid-feedback" id="valid-alamat">{{ $errors->first('alamat') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kegiatan">Kegiatan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('kegiatan') is-invalid @enderror" name="kegiatan" id="kegiatan" value="@error('kegiatan'){{ old('kegiatan') }}@else{{ $data->kegiatan }}@enderror" placeholder="Masukkan Kegiatan">
                                                <div class="invalid-feedback" id="valid-kegiatan">{{ $errors->first('kegiatan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="jumlah_pengikut">Jumlah Pengikut <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('jumlah_pengikut') is-invalid @enderror" name="jumlah_pengikut" id="jumlah_pengikut" value="@error('jumlah_pengikut'){{ old('jumlah_pengikut') }}@else{{ $data->jumlah_pengikut }}@enderror" placeholder="Masukkan Jumlah Pengikut">
                                                <div class="invalid-feedback" id="valid-jumlah_pengikut">{{ $errors->first('jumlah_pengikut') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Nomor dan Tanggal Pendaftaran Pada Kantor Kesbangpol</label>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="text" class="form-control form-control-sm @error('nomor_pendaftaran') is-invalid @enderror" name="nomor_pendaftaran" id="nomor_pendaftaran" value="@error('nomor_pendaftaran'){{ old('nomor_pendaftaran') }}@else{{ $data->nomor_pendaftaran }}@enderror" placeholder="Nomor">   
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="date" class="form-control form-control-sm @error('tgl_pendaftaran') is-invalid @enderror" name="tgl_pendaftaran" id="tgl_pendaftaran" value="@error('tgl_pendaftaran'){{ old('tgl_pendaftaran') }}@else{{ $data->tgl_pendaftaran }}@enderror"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Nomor dan Tanggal Pendaftaran Badan Hukum</label>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="text" class="form-control form-control-sm @error('nomor_badan') is-invalid @enderror" name="nomor_badan" id="nomor_badan" value="@error('nomor_badan'){{ old('nomor_badan') }}@else{{ $data->nomor_badan }}@enderror" placeholder="Nomor">   
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="date" class="form-control form-control-sm @error('tgl_badan') is-invalid @enderror" name="tgl_badan" id="tgl_badan" value="@error('tgl_badan'){{ old('tgl_badan') }}@else{{ $data->tgl_badan }}@enderror"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="keterangan">Keterangan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" value="@error('keterangan'){{ old('keterangan') }}@else{{ $data->keterangan }}@enderror" placeholder="Masukkan Keterangan">
                                                <div class="invalid-feedback" id="valid-keterangan">{{ $errors->first('keterangan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kecamatan_id">Kecamatan</label>
                                                <select class="select2 form-control form-control-sm @error('kecamatan_id') is-invalid @enderror" name="kecamatan_id" id="kecamatan_id">
                                                    <option value="" selected disabled>-- Pilih Kecamatan --</option>
                                                    @foreach ($kecamatans as $kecamatan )
                                                        <option value="{{ $kecamatan->id }}" {{ old('kecamatan_id') == $kecamatan->id || $data->kecamatan_id == $kecamatan->id ? 'selected' : '' }}>{{ $kecamatan->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback" id="valid-kecamatan_id">{{ $errors->first('kecamatan_id') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <button type="submit" class="btn btn-success btn-round float-right" id="btn-submit">
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
    <script src="{{ asset('backend/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/modules/summernote/summernote-bs4.js') }}"></script>
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

            // Open Modal to Add new Author
            $('#btn-add').click(function(e) {
                e.preventDefault();
                $('#formModal').modal('show');
                $('.modal-title').html('Add Author');
                $('#author-form').trigger('reset');
                $('#btn-save').html('<i class="fas fa-check"></i> Save Changes');
                $('#author-form').find('.form-control').removeClass('is-invalid is-valid');
                $('#btn-save').val('save').removeAttr('disabled');
            });

            $('body').on('keyup', '#title, #category_id, #content, #thumbnail', function() {
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
                        $('img').remove();
                        $('#thumbnail').after('<img src="' + e.target.result + '" class="img-thumbnail">');
                    };
                    reader.readAsDataURL(input.files[0]);
                };
            }

            $('#thumbnail').change(function() {
                filePreview2(this);
                $('#valid-thumbnail').html('');
            });

            $('form').submit(function() {
                $('#btn-submit').html('<i class="fas fa-cog fa-spin"></i> Saving...').attr("disabled", true);
            });
        })
    </script>
@endsection
