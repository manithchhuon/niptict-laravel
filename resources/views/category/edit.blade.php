@extends('layouts.admin_master')

@section('title','Edit')

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
	            <h2><i class="fa fa-shopping-cart"></i> <strong>Edit Categories</strong></h2>
	        </div>
	        <div>
	        	{!!Form::model($category,['route'=>['category.update',$category->id],'enctype'=>'multipart/form-data'])!!}
	        		@include('category.form')

	        	{!!Form::close()!!}
	        </div>
	    </div>
	
@endsection
@section('js')
	<script src={{asset("/vendor/unisharp/laravel-ckeditor/ckeditor.js")}}></script>
	<script src={{asset("/vendor/laravel-filemanager/js/lfm.js")}}></script>
    <script>
    	var options = {
    	  filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    	  filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    	  filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    	  filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    	};
        CKEDITOR.replace( 'des',options);
        
    </script>
@endsection