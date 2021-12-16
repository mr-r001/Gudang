@extends('admin.layouts.master')
@section('title', 'Scan QR Code')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Scan QR Code</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-file-pdf"></i>
                        Scan QR Code
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="card card-primary">  
                    <div class="card-body">
                        <form action="{{ route('admin.scan.qr') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="code">Scan QR Code disini</label>
                                        <input type="text" class="form-control" id="code" name="code" placeholder="Kode SKU">
                                        <div class="invalid-feedback" id="valid-code">{{ $errors->first('code') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-round" id="btn-submit">
                                        <i class="fas fa-check"></i>
                                        Cari 
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection