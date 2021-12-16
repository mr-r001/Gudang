@extends('admin.layouts.master')
@section('title', 'Transaksi')

@section('css')
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
      .rack {
        width: 250px;
        height: 300px;
        border-radius: 12px;
        background-color: #D7D7D7;
        margin-right: 10px;
        margin-bottom: 10px;
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
      .thumbnail {
        width: 100%;
        height: 60%;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        margin-bottom: 10px
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
                      <div class="rack">
                        <img src="http://127.0.0.1:8000/img/product/{{ $data->product['photo'] }}" class="thumbnail" />
                        <h5 class="productName">{{ $data->product['name'] }}</h5>
                        <h5 class="stock">Stok Barang: {{ $data->product['stock'] }}</h5>
                        <p class="stock">Letak Barang di rak: {{ $data->position }}</p>
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


