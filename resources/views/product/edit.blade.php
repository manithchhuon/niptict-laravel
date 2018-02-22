@extends('layouts.admin_master')

@section('title','Edit')
@section('css')
	<style type="text/css">
		.select2-container--default .select2-selection--multiple .select2-selection__choice{
			background-color:#333 !important;
		}
	</style>
@endsection
@section('content')
		@if($errors->any())
			<ul class="alert alert-danger">
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>

		@endif

		<div class="block">
	        <!-- Products Title -->
	        <div class="block-title">
	            <h2><i class="fa fa-shopping-cart"></i> <strong>Edit Products</strong></h2>
	        </div>
	        <div>
	        	{!!Form::model($product,['route'=>['product.update',$product->id],'enctype'=>'multipart/form-data'])!!}
	        		@include('product.form')

	        	{!!Form::close()!!}
	        </div>
	    </div>
	
@endsection
@section('js')
	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
    	var options = {
    	  filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    	  filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    	  filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    	  filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    	};
        CKEDITOR.replace( 'des',options);
        $('#lfm').filemanager('image');
        $('#category').select2();
    </script>
@endsection