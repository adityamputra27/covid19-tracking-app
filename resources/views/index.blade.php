@extends('layout/header')
@section('js')

@endsection
@section('content')
<section id="home">
	<div class="container">
		<h3>Search Country</h3>
		<div class="select">
			<form action="{{ url('/') }}" method="GET">
				<div class="form-group">
					<select name="country" class="form-control select2">
						<option value="" holder>-- Select --</option>
						@foreach($countryList as $key => $value)
						<option value="{{ $value }}" {{ $country == $value ? 'selected' : '' }}>{{ $value }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block mt-3"><span class="fa fa-search"></span> Search</button>
				</div>
			</form>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="card text-center" style="width: 22rem;">
				  <img src="{{ asset('assets') }}/images/meninggal.png" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h4 class="card-title">MENINGGAL</h4>
				    <p class="card-text text-warning" style="font-size: 1.6em; font-weight: bold;">{{ number_format($dataList[0]['deaths']) }} Orang</p>
				  </div>
				</div>
			</div>
			<div class="col-md-4" data-aos="fade-up">
				<div class="card text-center">
				  <div class="card-header">
				    <h4>
				    	<span style="text-transform: uppercase;">{{ $dataList[0]['country_name'] }}</span>
				    </h4>
				  </div>
				  <div class="card-body">
				    <h6 class="card-title">TOTAL KASUS DI NEGARA 
				    <span style="text-transform: uppercase;"><u>{{ $dataList[0]['country_name'] }}</u></span>
					</h6>
				    <p class="card-text text-info" style="font-size: 1.6em; font-weight: bold;">{{ number_format($dataList[0]['confirmed']) }} Orang</p>
				    <a href="#" class="btn btn-primary">Lihat Info Lainnya!</a>
				  </div>
				  <div class="card-footer text-muted">
				    <h6>TERAKHIR UPDATE {{ $dataList[0]['last_update'] }}</h6>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card text-center" style="width: 22rem;">
				  <img src="{{ asset('assets') }}/images/sembuh.png" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h4 class="card-title">SEMBUH</h4>
				    <p class="card-text text-primary" style="font-size: 1.6em; font-weight: bold;">{{ number_format($dataList[0]['recovered']) }} Orang</p>
				  </div>
				</div>
			</div>
		</div>
		<br><br><br><br><br><br><br><br>
	</div>
</section>
@endsection

