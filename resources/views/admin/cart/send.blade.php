@extends('admin.layouts.master')
@section('title', 'Data Produk')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Label Pengiriman</h1>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.cart.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title">Data Pengirim</h4>
                                </div>
                                <div class="card-body">
                                    <div class="text-danger" id="valid-type">{{ $errors->first('type') }}</div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="id_pengirim">Toko Pengirim <sup class="text-danger">*</sup></label>
                                                <select class="select2 form-control form-control-sm @error('id_pengirim') is-invalid @enderror" name="id_pengirim" id="id_pengirim">
                                                    <option value="" selected disabled>-- Pilih Toko Pengirim --</option>
                                                        @foreach ($resellers as $reseller)
                                                            <option value="{{ $reseller->id }}" {{ old('id_pengirim') == $reseller->id ? 'selected' : '' }}>{{ $reseller->name }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="phone_pengirim">No Handphone Pengirim <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('phone_pengirim') is-invalid @enderror" name="phone_pengirim" id="phone_pengirim" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="address_pengirim">Alamat Pengirim <sup class="text-danger">*</sup></label>
                                                <textarea class="form-control form-control-sm @error('address_pengirim') is-invalid @enderror" name="address_pengirim" id="address_pengirim" readonly></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="id_ekspedisi">Jasa ekspedisian <sup class="text-danger">*</sup></label>
                                                <select class="select2 form-control form-control-sm @error('id_ekspedisi') is-invalid @enderror" name="id_ekspedisi" id="id_ekspedisi">
                                                    <option value="" selected disabled>-- Pilih Jasa Pengiriman --</option>
                                                        @foreach ($ekspedisi as $data)
                                                            <option value="{{ $data->id }}" {{ old('id_ekspedisi') == $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title">Data Penerima</h4>
                                </div>
                                <div class="card-body">
                                    <div class="text-danger" id="valid-type">{{ $errors->first('type') }}</div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Nama Penerima <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Masukkan Nama Penerima">
                                                <div class="invalid-feedback" id="valid-name">{{ $errors->first('name') }}</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">No Handphone Penerima <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Masukkan No Handphone Penerima">
                                                <div class="invalid-feedback" id="valid-phone">{{ $errors->first('phone') }}</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Alamat Penerima <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}" placeholder="Masukkan Alamat Penerima">
                                                <div class="invalid-feedback" id="valid-address">{{ $errors->first('address') }}</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="note">Catatan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('note') is-invalid @enderror" name="note" id="note" value="{{ old('note') }}" placeholder="Masukkan Catatan">
                                                <div class="invalid-feedback" id="valid-note">{{ $errors->first('note') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-round ml-4">
                                    <i class="fas fa-print"></i>
                                    Cetak Label Pengiriman
                                </button>
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
    <script>
        $(document).ready(function() {
            // Setup AJAX CSRF
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('change', '#id_pengirim', function() {
                var id = $(this).val();
                ajaxurl = '{{ route("admin.cart.search", "id") }}'
                $.ajax({
                    type: 'GET',
                    url: ajaxurl,
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        console.log(data[0].phone)
                        $('#phone_pengirim').val(data[0].phone)
                        $('#address_pengirim').val(data[0].address)
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