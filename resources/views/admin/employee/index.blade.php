@extends('admin.layouts.master')
@section('title', 'Karyawan')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/datatables/datatables.min.css') }}">
@endsection

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Karyawan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-file-pdf"></i>
                        Karyawan
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible show fade">
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
                        <a class="btn btn-primary ml-auto" href="{{ route('admin.employee.create') }}">
                            <i class="fas fa-plus-circle"></i>
                            Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover" id="ebook-table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>ID Karyawan</th>
                                        <th>Nama</th>
                                        <th>Divisi</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
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
                ajax: '{{ route('admin.employee.index') }}',
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nip',
                        name: 'nip',
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'division',
                        name: 'division',
                    },
                    {
                        data: 'address',
                        name: 'address',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        className: 'text-center',
                        orderable: false,
                        searchable: false
                    }
                ],
                buttons: [],
                order: [],
                language: {
                    "decimal":        "",
                    "emptyTable":     "No data available in table",
                    "info":           "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "infoEmpty":      "Menampilan 0 sampai 0 dari 0 data",
                    "infoFiltered":   "(filtered from _MAX_ total entries)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Tampilkan _MENU_ data",
                    "loadingRecords": "Loading...",
                    "processing":     "Processing...",
                    "search":         "Cari:",
                    "zeroRecords":    "No matching records found",
                    "paginate": {
                        "first":      "First",
                        "last":       "Last",
                        "next":       "Selanjutnya",
                        "previous":   "Sebelumnya"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                }
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
                                url: '{{ route('admin.employee.index') }}' + '/' + id,
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
                                title: "Oh Ya!",
                                text: "Data aman, jangan khawatir",
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