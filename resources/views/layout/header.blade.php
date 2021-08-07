<!DOCTYPE html>
<html>
<head>
	<title>Home | COVID - 19</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/plugins/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/aos.css">
	<style>
		.select2-container .select2-selection--single {
			height: 38px !important;
		}
		.select2-container--default .select2-selection--single .select2-selection__rendered {
			line-height: 35px !important;
		}
		.select2-container--default .select2-selection--single .select2-selection__arrow {
			top: 6px !important;
		}
	</style>
</head>
<body>
	<header class="bg-light">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <a class="navbar-brand" href="#">COVID-19</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			    <div class="navbar-nav ml-auto">
			      <a class="nav-item nav-link active" href="#">HOME</a>
			      <a class="nav-item nav-link" href="#">INFO</a>
			      <a class="nav-item nav-link" href="#">PETA SEBARANG</a>
			    </div>
			  </div>
			</nav>
		</div>
	</header>
	<div class="jumbotron">
	    <div class="container">
	      <h1 class="">Selamat Datang Di Website Tracking COVID - 19!</h1>
	      <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
	      <p><a class="btn btn-primary" href="jumbotron.htm#" role="button">Lihat Semua Data &raquo;</a></p>
	    </div>
	</div>
	@yield('content')
	@yield('js')
	@include('layout/footer')
