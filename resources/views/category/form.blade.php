	<div class="form-group">
		{!!Form::Label('name','Category Name')!!}
		{!!Form::text('name',null,['class'=>'form-control blue','required'=>'required'])!!}
	</div>
	<div class="form-group">
		{!!Form::Label('des','Description')!!}
		{!!Form::textarea('des',null,['class'=>'form-control'])!!}
	</div>

	<div class="form-group">
		
		{!!Form::submit('Save',['class'=>'btn btn-success'])!!}
	</div>
	