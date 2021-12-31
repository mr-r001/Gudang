@extends('admin.layouts.master')
@section('title', 'Keranjang')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/datatables/datatables.min.css') }}">
@endsection

@section('content')
     <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Keranjang</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fas fa-map"></i>
                        Keranjang
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="card card-primary">
                    <br>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover" id="company-table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>QTY</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.cart.create') }}" class="btn btn-primary ml-auto">
                <i class="fa fa-paper-plane"></i>
                Kirim
            </a>
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
            $('#company-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.cart.index') }}',
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'product',
                        name: 'product'
                    },
                    {
                        data: 'total',
                        name: 'total'
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

            $('#company-table').DataTable().on('draw', function() {
                $('[data-toggle="tooltip"]').tooltip();
            });

            // Delete company
            $('body').on('click', '#btn-delete', function(){
                var id = $(this).val();
                var name = $(this).data('name');
                swal("Peringatan!", "Apakah anda yakin?", "warning", {
                    buttons: {
                        cancel: "Tidak!",
                        ok: {
                            text: "Ya!",
                            value: "ok"
                        }
                    },
                }).then((value) => {
                    switch (value) {
                        case "ok" :
                            $.ajax({
                                type: "DELETE",
                                url: '{{ route('admin.cart.store') }}' + '/' + id,
                                success: function(data) {
                                    $('#company-table').DataTable().draw(false);
                                    $('#company-table').DataTable().on('draw', function() {
                                        $('[data-toggle="tooltip"]').tooltip();
                                    });

                                    swal({
                                        title: "Berhasil!",
                                        text: "Data berhasil dihapus",
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
