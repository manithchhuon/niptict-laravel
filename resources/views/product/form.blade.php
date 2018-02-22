	<div class="form-group">
		{!!Form::Label('name','Product Name')!!}
		{!!Form::text('name',null,['class'=>'form-control','required'=>'required'])!!}
	</div>
	<div class="form-group">
		{!!Form::Label('Category','Category')!!}
		{!!Form::select('category[]',$categories,$categories_selected,['class'=>'form-control','required'=>'required','id'=>'category','multiple'=>'multiple'])!!}
	</div>
	<div class="form-group">
		{!!Form::Label('des','Description')!!}
		{!!Form::textarea('des',null,['class'=>'form-control'])!!}
	</div>
	<div class="input-group">
	   <span class="input-group-btn">
	     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
	       <i class="fa fa-picture-o"></i> Choose
	     </a>
	   </span>
	   {!!Form::text('image',$product->image,['class'=>'form-control','id'=>"thumbnail"])!!}
	 </div>
	 <img id="holder" style="margin-top:15px;max-height:100px;" @if($product->image) src={{Storage::url($product->image)}} @endif>

	<div class="form-group">
		
		{!!Form::submit('Save',['class'=>'btn btn-primary'])!!}
	</div>
	