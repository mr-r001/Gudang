@extends('admin.layouts.master')
@section('title', 'Pengawasan Media Komunikasi')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/datatables/datatables.min.css') }}">
@endsection

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pengawasan Media Komunikasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-file-pdf"></i>
                        Pengawasan Media Komunikasi
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-primary alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {!! session('success') !!}
                    </div>
                </div>
            @endif

            <div class="section-body">
                <div class="card card-primary">  
                    <div class="card-header">
                        <a class="btn btn-success" href="{{ route('admin.pengawasan_media.filter') }}">
                            <i class="fas fa-print"></i>
                            Download
                        </a>
                        @if (auth()->user()->isAdmin())
                        <a class="btn btn-success ml-auto" href="{{ route('admin.pengawasan_media.create') }}">
                            <i class="fas fa-plus-circle"></i>
                            Tambah Data
                        </a>
                        @elseif (auth()->user()->isOperator())
                        <a class="btn btn-success ml-auto" href="{{ route('admin.pengawasan_media.create') }}">
                            <i class="fas fa-plus-circle"></i>
                            Tambah Data
                        </a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover" id="ebook-table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Media</th>
                                        <th>Tanggal Publikasi</th>
                                        <th>Pimpinan</th>
                                        @if (auth()->user()->isAdmin())
                                            <th>Aksi</th>
                                        @elseif (auth()->user()->isOperator())
                                            <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/modules/sweetalert/sweetalert.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Setup AJAX CSRF
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Initializing DataTable
            $('#ebook-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.pengawasan_media.index') }}',
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'media',
                        name: 'media',
                    },
                    {
                        data: 'tgl_publikasi',
                        name: 'tgl_publikasi'
                    },
                    {
                        data: 'pimpinan',
                        name: 'pimpinan'
                    },
                    @if (auth()->user()->isAdmin())
                    {
                        data: 'action',
                        name: 'action',
                        className: 'text-center',
                        orderable: false,
                        searchable: false
                    }
                    @elseif (auth()->user()->isOperator())
                         {
                        data: 'action',
                        name: 'action',
                        className: 'text-center',
                        orderable: false,
                        searchable: false
                    }
                    @endif
                ],
                buttons: [],
                order: []
            });

            // Delete one item
            $('body').on('click', '#btn-delete', function(){
                var id = $(this).val();
                var ebook = $(this).data('ebook');
                swal("Peringatan!", "Apakah anda yakin?", "warning", {
                    buttons: {
                        cancel: "Tidak!",
                        ok: {
                            text: "Ya",
                            value: "ok"
                        }
                    },
                }).then((value) => {
                    switch (value) {
                        case "ok" :
                            $.ajax({
                                type: "DELETE",
                                url: '{{ route('admin.pengawasan_media.index') }}' + '/' + id,
                                success: function(data) {
                                    $('#ebook-table').DataTable().draw(false);
                                    $('#ebook-table').DataTable().on('draw', function() {
                                        $('[data-toggle="tooltip"]').tooltip();
                                    });

                                    swal({
                                        title: "Selamat!",
                                        text: "Data berhasil di hapus",
                                        icon: "success",
                                        timer: 3000
                                    });
                                },
                                error: function(data) {
                                    swal({
                                        title: "Maaf!",
                                        text: "Terjadi kesalahan, Silahkan coba lagi",
                                        icon: "error",
                                        timer: 3000
                                    });
                                }
                            });
                        break;

                        default :
                            swal({
                                title: "Oh Yeah!",
                                text: "It's safe, don't worry",
                                icon: "info",
                                timer: 3000
                            });
                        break;
                    }
                });
            });
        });
    </script>
@endsection
