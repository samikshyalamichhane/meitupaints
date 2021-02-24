@extends('layouts.admin')	
@section('title','Add About Us')
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
	<h1> About Us<small>create</small></h1>
	<ol class="breadcrumb">
		<li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href=""> About Us</a></li>
		<li><a href="">Create</a></li>
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
<form method="post" action="{{route('about.store')}}" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="row">
		<div class="col-md-8">
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title">Add About Us</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label>Title1(required)</label>
						<input type="text" name="title1" class="form-control" value="{{old('title1')}}">
					</div>
					
					<div class="form-group">
						<label>Short Description1</label>
						<textarea class="form-control" name="short_description1" rows="3">{{old('short_description1')}}</textarea>
					</div>
					<div class="form-group">
						<label>Description(required)</label>
						<textarea class="form-control" name="description1" rows="3">{{old('description1')}}</textarea>
					</div>
					<div class="form-group">
						<label>Title2(required)</label>
						<input type="text" name="title2" class="form-control" value="{{old('title2')}}">
					</div>
					
					<div class="form-group">
						<label>Short Description2</label>
						<textarea class="form-control" name="short_description2" rows="3">{{old('short_description2')}}</textarea>
					</div>
					<div class="form-group">
						<label>Description(required)</label>
						<textarea class="form-control" name="description2" rows="3">{{old('description2')}}</textarea>
					</div>
					<div class="form-group">
						<label>Title3(required)</label>
						<input type="text" name="title3" class="form-control" value="{{old('title3')}}">
					</div>
					
					<div class="form-group">
						<label>Short Description3</label>
						<textarea class="form-control" name="short_description3" rows="3">{{old('short_description3')}}</textarea>
					</div>
					<div class="form-group">
						<label>Description(required)</label>
						<textarea class="form-control" name="description3" rows="3">{{old('description3')}}</textarea>
					</div>
					
					<div class="form-group">
						<label>Dedicated Team Member</label>
						<input type="integer" name="dedicated_team_member" class="form-control" value="{{old('dedicated_team_member')}}">
					</div>
					<div class="form-group">
						<label>Projects Completed</label>
						<input type="integer" name="projects_completed" class="form-control" value="{{old('projects_completed')}}">
					</div>
					<div class="form-group">
						<label>Regular Users</label>
						<input type="integer" name="regular_users" class="form-control" value="{{old('regular_users')}}">
					</div>
					<div class="form-group">
						<label>Awards</label>
						<input type="integer" name="awards" class="form-control" value="{{old('awards')}}">
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-4">
			<!-- <div class="box box-warning">
                <div class="box-header with-heading">
                    <h3 class="box-title">SEO</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                       <label>Meta Title</label>
                       <input type="text" name="meta_title" class="form-control" value="{{old('meta_title')}}">
                    </div>
                    <div class="form-group">
                       <label>Keyword</label>
                       <textarea class="form-control" name="keyword" rows="3">{{old('keyword')}}</textarea>
                    </div>
                    <div class="form-group">
                       <label>Meta Description</label>
                       <textarea class="form-control" name="meta_description" rows="3">{{old('meta_description')}}</textarea>
                    </div>
                </div>
            </div> -->
			<div class="box box-warning">
				<div class="box-header with-heading">
					<h3 class="box-title">Image</h3>
				</div>
				<div class="box-body">
					<!--<div class="form-group">-->
					<!--   <label>Upload Banner Image</label>-->
					<!--   <input type="file" name="banner_image" class="form-control">-->
					<!--</div>-->
					<div class="form-group">
					   <label>Upload Image1</label>
					   <input type="file" name="image1" class="form-control">
					</div>
					<div class="form-group">
					   <label>Upload Image2</label>
					   <input type="file" name="image2" class="form-control">
					</div>
				</div>
			</div>
			<div class="box box-warning">
				<div class="box-header with-heading">
					<h3 class="box-title">Publish</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="publish"><input type="checkbox" id="publish" name="publish" checked> Publish</label>
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
  	CKEDITOR.replace('description1');
  	CKEDITOR.replace('description2');
  	CKEDITOR.replace('description3');
    CKEDITOR.config.height = 200;
  	$('#datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });

  	$('#timepicker1').timepicker();
  	$('.message').delay(5000).fadeOut(400);
    </script>
@endpush