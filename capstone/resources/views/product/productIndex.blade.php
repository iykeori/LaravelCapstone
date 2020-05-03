@extends('common2') 

@section('pagetitle')
Item List
@endsection

@section('pagename')
Laravel Project
@endsection

@section('content')

    <div class="container">
	
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <h1 style="text-align:center">Products List</h1>
            </div>
            <div class="col-md-12">
                <hr />
            </div>
        </div>
        <div class="row" style="float:left;">
            

                <table class="table">
                    <thead>
                        <th><h3>Category</h3></th>
                        
                    </thead>
                    <tbody>
                        @foreach ($cat as $category)
                            <tr>
                                
                                <td><h4><a href="{{ route('products.show', $category->id) }}" >{{ $category->name }} </a></h4></td>
                                
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            
        </div>

        <div class="row" style="float:right;">
            <div class="table-responsive-lg">
                <table class="table">
                    <thead>
                        
                        <th>Product id</th>
                        <th>&nbsp;&nbsp;&nbsp;</th>
                        <th>Title</th>
                        <th>&nbsp;&nbsp;&nbsp;</th>
                        <th> Image </th>
                        <th>&nbsp;&nbsp;&nbsp;</th>
                        <th>Price</th>
                        <th>&nbsp;&nbsp;&nbsp;</th>
                        <th></th>
                        <th>&nbsp;&nbsp;&nbsp;</th>
                    </thead>
                    <tbody>
                         
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><a href="{{ route('products.detail', $item->id) }}" >{{ $item->title }}</a></td>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><a href="{{ route('products.detail', $item->id) }}" ><img src ="{{ Storage::url('public/images/items/'.$item->picture) }}" height= "100" width="100" /></a></td>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td>{{$item->price}}</td>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td style='width:150px;'><div style='float:left; margin-right:5px; background-color:blue;'><a href="{{ route('products.detail', $item->id) }}" class="btn btn-primary btn-sm">Buy now</a></div><div style='float:left;  '></div>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div> <!-- end of .col-md-8 -->
        </div>
    </div>
@endsection