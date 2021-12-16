@extends('admin.layouts.master')
@section('title', 'Detail Produk')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <!-- Modal -->
 
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Produk</h1>
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
                            Detail Produk
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-eyes"></i>
                        Detail Produk
                    </div>
                </div>
            </div>
            <div class="section-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Detail</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-md">
                                <tr>
                                    <td>Kode SKU</td>
                                    <td class="text-center">{{ $data[0]->code }}</th>
                                </tr>
                                <tr>
                                    <td>Nama Produk</td>
                                    <td class="text-center">{{ $data[0]->name }}</th>
                                </tr>
                                <tr>
                                    <td>Satuan</td>
                                    <td class="text-center">{{ $data[0]->unit }}</th>
                                </tr>
                                <tr>
                                    <td>Harga Modal</td>
                                    <td class="text-center">{{ $data[0]->capital_price }}</th>
                                </tr>
                                <tr>
                                    <td>Harga Umum</td>
                                    <td class="text-center">{{ $data[0]->price }}</th>
                                </tr>
                                <tr>
                                    <td>Harga Reseller</td>
                                    <td class="text-center">{{ $data[0]->reseller_price }}</th>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td class="text-center">{{ $data[0]->stock }}</th>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td class="text-center">{{ $data[0]->description }}</th>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td class="text-center">{{ $data[0]->category->name }}</th>
                                </tr>
                                <tr>
                                    <td>Bahan</td>
                                    <td class="text-center">{{ $data[0]->material }}</th>
                                </tr>
                                <tr>
                                    <td>Warna / Desain</td>
                                    <td class="text-center">{{ $data[0]->color }}</th>
                                </tr>
                                <tr>
                                    <td>Laminasi</td>
                                    <td class="text-center">{{ $data[0]->laminate }}</th>
                                </tr>
                                <tr>
                                    <td>Ukuran Packing</td>
                                    <td class="text-center">Panjang: {{ $data[0]->length }}</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-center">Lebar: {{ $data[0]->width }}</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-center">Tinggi: {{ $data[0]->height }}</th>
                                </tr>
                                <tr>
                                    <td>Berat</td>
                                    <td class="text-center">{{ $data[0]->weight }} gram/kg</th>
                                </tr>
                                <tr>
                                    <td>Foto Produk</td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="http://127.0.0.1:8000/img/product/{{ $data[0]->photo }}"  width="100" height="100" class="img-rounded" />
                                    </td>
                                </tr>
                            </table>
                          </div>
                    </div>
                </div>
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