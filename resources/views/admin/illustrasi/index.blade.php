@extends('admin.layouts.master')
@section('title', 'Ilustrasi Letak Produk')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/css/map.css') }}">
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
        color: black;
      }
      .wrapper-rack {
        min-width: 90%;
        display: flex;
        flex-wrap: wrap;
      }
      .rack {
        width: 70px;
        height: 70px;
        border-radius: 12px;
        background-color: #D7D7D7;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
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
        <h1>Ilustrasi Letak Produk</h1>
      </div>
      <div class="section-body">
        <div class="card card-primary">
          <div class="container mt-2">
          @php
            $rackbyCategory = $data;
            foreach ($rackbyCategory as $category => $rack) {
              echo "<div style='display: flex;margin-bottom: 20px;margin-top: 30px;flex-wrap: wrap'>";
              echo "<h3 class='category'>$category</h3>";
              echo "<div class='wrapper-rack'>";
                foreach ($rack as $data) {
                  echo "<div class='rack'>";
                  echo "<h5 class='label'>".$data->position."</h5>";
                  echo "<p>".$data->product['name']."</p>";
                  echo "</div>";
                }
              echo "</div>";
              echo "</div>";
            }
          @endphp
          </div>
        </div>
    </div>
    </section>
  </div>
@endsection


