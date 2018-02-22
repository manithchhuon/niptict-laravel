	<div class="form-group">
		{!!Form::Label('name','Role Name')!!}
		{!!Form::text('name',null,['class'=>'form-control','required'=>'required'])!!}
	</div>
	<div class="form-group">
		{!!Form::Label('modules','Module')!!}
		{!!Form::select('modules',$allkey,null,['class'=>'form-control'])!!}
	</div>
	<div class="form-group">
		{!!Form::hidden('role',null,['class'=>'form-control'])!!}
		{!!Form::hidden('permission',null,['class'=>'form-control'])!!}
		{!!Form::hidden('id',null,['class'=>'form-control'])!!}
	</div>
	