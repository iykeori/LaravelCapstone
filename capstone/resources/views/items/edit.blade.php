@extends('common') 

@section('pagetitle')
Edit Item
@endsection

@section('pagename')
Laravel Project
@endsection

@section('scripts')
{!! Html::script('/bower_components/parsleyjs/dist/parsley.min.js') !!}
<script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
	tinymce.init({
	  forced_root_block : "",
	  menubar: "insert",
	  selector:'#description',
	  plugins:['fullscreen', 'charmap', 'lists', 'paste'],
	  toolbar: "paste | undo redo | bold italic underline subscript superscript charmap bullist numlist | indent outdent blockquote | removeformat | fullscreen",
	  paste_as_text: true,
	  setup: function (editor) {
		editor.on('change', function () {
		tinymce.triggerSave();
		});
	  }
	});
</script>
@endsection

@section('css')
{!! Html::style('/css/parsley.css') !!}
@endsection

@section('content')

	<div class="row">
		{!! Form::model($item, ['route' => ['items.update', $item->id], 'method'=>'PUT', 'data-parsley-validate' => '', 'files' => true]) !!}
		<div class="col-md-6 col-md-offset-2">

			<h1>Edit Post</h1>
			<hr/>

			{{ Form::label('title', 'Name:') }}
			    {{ Form::text('title', null, ['class'=>'form-control', 'style'=>'', 
			                                  'data-parsley-required'=>'', 
											  'data-parsley-maxlength'=>'255']) }}

				{{ Form::label('category_id', 'Category:', ['style'=>'margin-top:20px']) }}
				<select name='category_id' class='form-control' data-parsley-required="true">
					<option value="">Select Category</option>
					@foreach ($categories as $category)
						<option value='{{ $category->id }}' {{ ($category->id == $item->category_id) ? " selected " : "" }}>{{ $category->name }}</option>
					@endforeach
				</select>

			    {{ Form::label('description', 'Description:', ['style'=>'margin-top:20px']) }}
			    {{ Form::textarea('description', null, ['class'=>'form-control', 
				                                 'data-parsley-required'=>'[1, 250]']) }}

				{{ Form::label('price', 'Price:', ['style'=>'margin-top:20px']) }}
			    {{ Form::text('price', null, ['class'=>'form-control', 'style'=>'', 
			                                  'data-parsley-required'=>'']) }}

				{{ Form::label('quantity', 'Quantity:', ['style'=>'margin-top:20px']) }}
			    {{ Form::text('quantity', null, ['class'=>'form-control', 'style'=>'', 
											  'data-parsley-required'=>'']) }}
											  
				{{ Form::label('sku', 'SKU:', ['style'=>'margin-top:20px']) }}
			    {{ Form::text('sku', null, ['class'=>'form-control', 'style'=>'', 
											  'data-parsley-required'=>'']) }}

				@if ($item->picture != "")
				    <p style='margin-top:20px'>Current Image:<br><img src="{{ Storage::url('public/images/items/'.$item->picture) }}" style='height:100px;' ></p>
			    @endif

				{{ Form::label('picture', 'Picture:', ['style'=>'margin-top:20px']) }}
			    {{ Form::file('picture', null, ['class'=>'form-control', 
				                                       'style'=>'',
													   'data-parsley-required'=>'']) }}
		
		</div>
		<div class="col-md-4">
			<div class="well" style="margin-top: 20px">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($item->created_at)) }}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($item->updated_at)) }}</dd>
				</dl>
				<hr />
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('items.index', 'Cancel', [$item->id], ['class'=>'btn btn-danger btn-block']) !!}
					</div>
					<div class="col-sm-6">
					    {{ Form::submit('Save Changes', ['class'=>'btn btn-success btn-block', 'style'=>'margin-top:0px']) }}
					</div>
				</div>
			</div>		
		</div>
		{!! Form::close() !!}
	</div>


@endsection