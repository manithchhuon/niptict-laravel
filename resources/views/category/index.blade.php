@extends('layouts.admin_master')
@section('title')
	List
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

@section('content')
	<div class="block">
        <!-- Products Title -->
        <div class="block-title">
            <h2><i class="fa fa-list"></i> <strong>Category</strong></h2>
        </div>
        <!-- END Products Title -->
        <div>{!!link_to_route('category.create',"Create", [], ['class'=>'btn btn-primary']);!!}</div>
        <!-- Products Content -->
        <div class="table-responsive">
            {!!$html->table(['class'=>'table table-striped table-bordered'])!!}
        </div>
        <!-- END Products Content -->
    </div>
    
@endsection
@section('js')
    <script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    
   {!!$html->scripts()!!}
   <script type="text/javascript">
       alertOnDelete("delete","name","{{csrf_token()}}","{{route('category.delete')}}");
   </script>
@endsection