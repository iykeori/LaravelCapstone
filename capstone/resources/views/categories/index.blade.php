@extends('common') 

@section('pagetitle')
Item List
@endsection

@section('pagename')
Laravel Project
@endsection

@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Category List</h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('categories.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Add Category</a>
		</div>
		<div class="col-md-12">
			<hr />
		</div>
	</div>

	<div class="row">
		<div class="table-responsive-lg">
			<table class="table">
				<thead>
					<th>#</th>
					
					<th>Name</th>
					
					<th>Created At</th>
					
					<th>Last Modified</th>
					
					<th></th>
					
					<th></th>
					
				</thead>
				<tbody>
					@foreach ($categories as $category)
						<tr>
							<td>{{ $category->id }}</td>				
							<td>{{ $category->name }}</td>						
							<td >{{ date('M j, Y', strtotime($category->created_at)) }}</td>
							
							<td >{{ date('M j, Y', strtotime($category->updated_at)) }}</td>
							
							<td ><div style='float:left; margin-right:5px;'><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success btn-sm">Edit</a></div><div style='float:left;'></div>
							</td>
						
							@if (count($category->items)==0)
								<td style='width:150px;'><div style='float:left; margin-right:5px;'>
									{!! Form::open(['route' => ['categories.destroy', $category->id], 'method'=>'DELETE']) !!}
							    	{{ Form::submit('Delete', ['class'=>'btn btn-sm btn-danger btn-block', 'style'=>'', 'onclick'=>'return confirm("Are you sure?")']) }}
									{!! Form::close() !!}

									</div><div style='float:left;'></div>
								</td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of .col-md-8 -->
	</div>

@endsection