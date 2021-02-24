@extends('layouts.admin')	
@section('title','Edit Team')
@push('admin.styles')
<!-- Date Picker -->
<link rel="stylesheet" href="{{ asset('backend/plugins/datepicker/datepicker3.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css">
<!-- bootstrap wysihtml5 - text editor -->
@endpush
@section('content')
<section class="content-header">
	<h1>Team<small>edit</small></h1>
	<ol class="breadcrumb">
		<li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="">Team</a></li>
		<li><a href="">Edit</a></li>
	</ol>
</section>
<div class="content">
	@if (count($errors) > 0)
	<div class="alert alert-danger message">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      		<span aria-hidden="true">&times;</span>
    	</button>
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif
<form method="post" action="{{route('team.update',$detail->id)}}" enctype="multipart/form-data">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="PUT">
	<div class="row">
		<div class="col-md-8">
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title">Edit team</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label>Name(required)</label>
						<input type="text" name="name" class="form-control" value="{{$detail->name}}">
					</div>
					<div class="form-group">
						<label>Designation</label>
						<input type="text" name="designation" class="form-control" value="{{$detail->designation}}">
					</div>
					<div class="form-group">
						<label>Twitter</label>
						<input type="text" name="twitter" class="form-control" value="{{$detail->twitter}}">
					</div>
					<div class="form-group">
						<label>Facebook</label>
						<input type="text" name="facebook" class="form-control" value="{{$detail->facebook}}">
					</div>
					
					<div class="form-group">
						<label>Pininterest</label>
						<input type="text" name="pininterest" class="form-control" value="{{$detail->pininterest}}">
					</div>

					<div class="form-group">
						<label>Google Plus</label>
						<input type="text" name="googleplus" class="form-control" value="{{$detail->googleplus}}">
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			
			<div class="box box-warning">
				<div class="box-header with-heading">
					<h3 class="box-title">Image</h3>
				</div>
				<div class="box-body">
					<!--<div class="form-group">-->
					<!--   <label>Upload Banner Image</label>-->
					<!--   <input type="file" name="banner_image" class="form-control">-->
					<!--   @if($detail->banner_image)-->
					<!--   <img src="{{asset('images/main/'.$detail->banner_image)}}" height="100" width="100">-->
					<!--   @endif-->
					<!--</div>-->
					<div class="form-group">
					   <label>Upload Image</label>
					   <input type="file" name="image" class="form-control">
					   @if($detail->image)
					   <img src="{{asset('images/listing/'.$detail->image)}}">
					   @endif
					</div>
				</div>
			</div>
			<div class="box box-warning">
				<div class="box-header with-heading">
					<h3 class="box-title">Publish</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="publish"><input type="checkbox" id="publish" name="publish" {{$detail->publish==1?'checked':''}}> Publish</label>
				    </div>
				    <div class="form-group">
				    	<input type="submit" name="save" value="save" class="btn btn-success">
				    </div>
				</div>
			</div>
		</div>
	</div>
</form>
</div>
@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- datepicker -->
  <script src="{{ asset('backend/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
  <!-- CK Editor -->
  <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script>
  <!-- datepicker -->
  <script>
  	CKEDITOR.replace('description');
    CKEDITOR.config.height = 200;
  	$('#datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });

  	$('#timepicker1').timepicker();
  	$('.message').delay(5000).fadeOut(400);
    </script>
@endpush