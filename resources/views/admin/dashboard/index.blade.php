@extends('admin.layouts.master')
@section('title', 'Dashboard')

@section('content')
  	<div class="main-content">
  		<section class="section">
    		<div class="section-header">
      			<h1>Dashboard</h1>
    		</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-6 col-12">
					<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="fas fa-industry"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
						<h4>Total Toko Pengirim</h4>
						</div>
						<div class="card-body">
						{{ count($reseller) }}
						</div>
					</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6 col-12">
					<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="fas fa-list-alt"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
						<h4>Total Produk</h4>
						</div>
						<div class="card-body">
							{{ count($product) }}
						</div>
					</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6 col-12">
					<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="fas fa-list-alt"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
						<h4>Total Kategori Produk</h4>
						</div>
						<div class="card-body">
							{{ count($category) }}
						</div>
					</div>
					</div>
				</div>                
			</div>
  		</section>
	</div>
@endsection


