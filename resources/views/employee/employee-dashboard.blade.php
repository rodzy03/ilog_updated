@extends('layouts.main')
@section('title','dashboard')
@section('content')

@section('extra-css')

@endsection

<!-- begin #content -->
<div id="content" class="content">
  <!-- begin breadcrumb -->
  <ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>

  </ol>
  <!-- end breadcrumb -->

  <!-- begin page-header -->
  <h1 class="page-header">&nbsp;<small></small></h1>
  <!-- end page-header -->
  <!-- begin row -->
  <div class="row ">
    <!-- begin col-3 -->
    <div class="col-lg-3 col-md-6">
					<div class="m-b-10 f-s-10 m-t-10"><b class="text-inverse">EXAMPLE</b></div>
					
					<!-- begin card -->
					<div class="card">
						<img class="card-img-top" src="../assets/img/gallery/gallery-1.jpg" alt="" />
						<div class="card-block">
							<h4 class="card-title m-t-0 m-b-10">Card title</h4>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<a href="javascript:;" class="btn btn-sm btn-default">Go somewhere</a>
						</div>
					</div>
					<!-- end card -->
					
					<div class="m-b-10 f-s-10 m-t-20"><b class="text-inverse">IMAGE OVERLAYS</b></div>
					
					<!-- begin card -->
					<div class="card card-inverse">
						<img class="card-img" src="../assets/img/gallery/gallery-15.jpg" alt="" />
						<div class="card-img-overlay">
							<h4 class="card-title">Card title</h4>
							<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
							<p class="card-text"><small>Last updated 3 mins ago</small></p>
						</div>
					</div>
					<!-- end card -->
					
					<div class="m-b-10 f-s-10 m-t-20"><b class="text-inverse">INVERTED TEXT</b></div>
					
					<!-- begin card -->
					<div class="card card-inverse bg-gradient-black">
						<div class="card-block">
							<h4 class="card-title m-t-5 m-b-10">Special title treatment</h4>
							<p class="card-text m-b-15">With supporting text below as a natural lead-in to additional content.</p>
							<a href="javascript:;" class="btn btn-sm btn-warning">Go somewhere</a>
						</div>
					</div>
					<!-- end card -->
				</div>
				<!-- end col-3 -->



  </div>
  <!-- end #content -->

  @section('extra-js')

 @endsection
  @endsection