@extends('layouts.admin_master')
@section('title','View')
@section('js')
	
@endsection
@section('css')
	
@endsection
@section('content')
		<div class="block">
	        <!-- Products Title -->
	        <div class="block-title">
	            <h2><i class="fa fa-list"></i> <strong>View Category</strong></h2>
	        </div>
	        <!-- END Products Title -->
	        @if($category)

        		<b>{{$category->name}}</b>
        		<hr>
        		<div>{!!$category->des!!}</div>
        	@endif
	        <!-- END Products Content -->
	    </div>
	
@parent
@endsection