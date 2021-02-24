@extends('layouts.admin') 
@section('title','Dashboard')
@push('admin.styles')
<!-- Date Picker -->
<link rel="stylesheet" href="{{ asset('backend/plugins/datepicker/datepicker3.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
<!-- bootstrap wysihtml5 - text editor -->
@endpush
@section('content')
<section class="content-header">
  <h1>Dashboard<small></small></h1>
</section>
<div class="content">
  <div class="col-md-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        
        <h3>7</h3>

        <p>Projects</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="http://localhost/paints/public/admin/project_case" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

   <div class="col-md-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        
        <h3>3</h3>

        <p>Subscribers</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="http://localhost/paints/public/admin/subscriber" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

   <div class="col-md-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-fuchsia">
      <div class="inner">
        
        <h3>3</h3>

        <p>Testimonials</p>
      </div>
      <div class="icon">
        <i class="ion-android-arrow-dropright-circle"></i>
      </div>
      <a href="http://localhost/paints/public/admin/testimonial" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-md-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        
        <h3>11</h3>

        <p>Products</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="http://localhost/paints/public/admin/product" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  
    
   <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Contacts</h3>
          </div>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.N.</th>
                  <th>Title</th>
                  <th>Image</th>
                </tr>
              </thead>
              <tbody>
                                                <tr>
                  <td>1</td>
                  <td>Tanner Pierce</td>
                  <td>82</td>
                  <td>cyxeqon@demypewun.com</td>
                  
                </tr>
                                                    <tr>
                  <td>2</td>
                  <td>Ishmael Holman</td>
                  <td>100</td>
                  <td>sitafe@qifu.com</td>
                  
                </tr>
                                                    <tr>
                  <td>3</td>
                  <td>Vaughan Riley</td>
                  <td>5525865</td>
                  <td>sysim@gusepajyzafawix.com</td>
                  
                </tr>
                                                    <tr>
                  <td>4</td>
                  <td>Dale Mejia</td>
                  <td>5512585</td>
                  <td>guboty@jebygusihuzaziq.com</td>
                  
                </tr>
                                                    <tr>
                  <td>5</td>
                  <td>Hayfa Joseph</td>
                  <td>55555</td>
                  <td>puvev@tuko.com</td>
                  
                </tr>
                                                </tbody>

            </table>
            <a href="http://localhost/paints/public/admin/contact" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            
          </div>
        </div>
      </div>
    </div>    
 
  
</div>
@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('js/accessible_character_countdown.js') }}"></script>
  <!-- datepicker -->
  <script src="{{ asset('backend/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
  <!-- CK Editor -->
  <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
  <!-- datepicker -->
  <script>
    CKEDITOR.replace('donation_detail');
    CKEDITOR.config.height = 200;
    $(document).ready(function () {
        $( "#input-field-demo" ).accessibleCharCount()
     });
    
    </script>
@endpush