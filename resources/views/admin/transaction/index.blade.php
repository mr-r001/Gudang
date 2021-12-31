@extends('admin.layouts.master')
@section('title', 'Transaksi')

@section('css')
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <style>
      .category {
        min-width: 10%;
        font-size: 16px;
        color: black;
        margin-right: 20px;
        margin-top: 5px;
        margin-bottom: 20px
      }
      .label {
        padding-top: 10px;
        font-size: 12px;
        color: #111111;
      }
      .productName {
        padding-left: 10px;
        font-size: 16px;
        color: #111111;
      }
      .stock {
        padding-left: 10px;
        font-size: 14px;
        color: #222222;
      }
      .wrapper-rack {
        min-width: 90%;
        display: flex;
        flex-wrap: wrap;
      }
      .rackNull {
        width: 250px;
        height: 300px;
        border-radius: 12px;
        background-color: #D7D7D7;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 10px;
        margin-bottom: 10px;
      }
    </style>
@endsection

@section('content')
   <!-- Main Content -->
   <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Transaksi</h1>
      </div>
      <div class="section-body">
        <div class="card card-primary">
          <div class="container mt-2">
            <?php 
              $rackbyCategory = $data;
              foreach ($rackbyCategory as $category => $rack) { ?>
                <div style='display: flex;margin-bottom: 20px;margin-top: 30px;flex-wrap: wrap'>
                <h3 class='category'>{{ $category }}</h3>
                <div class='wrapper-rack'>
                  <?php
                  foreach ($rack as $data) { ?>
                      @if ($data->product['photo'])
                      <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <article class="article">
                          <div class="article-header">
                            <div class="article-image" data-background="http://127.0.0.1:8000/img/product/{{ $data->product['photo'] }}">
                            </div>
                            <div class="article-title">
                              <h2><a href="#">{{ $data->product['name'] }}</a></h2>
                            </div>
                          </div>
                          <div class="article-details">
                            <h5>Stok Barang: <span id="stock">{{ $data->product['stock'] }}</span></h5>
                            <p>Letak Barang di rak: {{ $data->position }} </p>
                            <div class="article-cta">
                              <button class="btn btn-primary" onclick="btnSubmit({{ $data->product_id }})">
                                Ambil Barang
                              </button>
                            </div>
                          </div>
                        </article>
                      </div>
                      @else
                      <div class="rackNull">
                        <h5 class="label">{{ $data->position }} Masih kosong</h5>
                      </div>
                      @endif
                    <?php
                  }
                  ?>
                </div>
                </div>
            <?php
              }
            ?>
          </div>
        </div>
    </div>
    </section>
  </div>
@endsection

@section('js')  
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        function btnSubmit(id){
          ajaxurl = '{{ route("admin.addCart", "id") }}'
          $.ajax({
              type: 'GET',
              url: ajaxurl,
              data: {
                  id: id,
              },
              success: function(data) {
                if (data.message == 'Stok kosong') {
                  toastr.error('Maaf, Stok Kosong!')
                } else {
                  toastr.success('Berhasil ditambahkan ke keranjang.', {timeOut: 5000})
                  setTimeout(function(){
                    location.reload();
                  }, 5000);
                }
              },
              error: function(data) {
                  console.log("Error: ",data)
              }
          });
        }
        $(document).ready(function() {
            // Setup AJAX CSRF
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })
    </script>
@endsection


