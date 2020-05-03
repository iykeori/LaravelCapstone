@extends('common2') 

@section('pagetitle')
Details
@endsection

@section('pagename')
Product Detail {{$item->id}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Product Details</h1>
        </div>              
        <hr />       
    </div>
    <div class="container">
        <div style="float:left; display: block; margin-left: auto;  margin-right: auto;width: 40%;">
            <img src ="{{ Storage::url('public/images/items/'.$item->picture) }}" height= "500" width="550" />
        </div><br>
        <div  style="float:right">
            <div class="row">
                <div class="table">
                    
                        
                        <tbody>
                    
                                <tr>
                                    <h4>Title: </h4> {{$item->title}}             
                                </tr>

                                <tr>
                                    <h4>Product_id: </h4> {{$item->id}}             
                                </tr>

                                <tr>
                                    <h4>Description: </h4> {{$item->description}}             
                                </tr>

                                <tr>
                                    <h4>Price:</h4> ${{$item->price}}             
                                </tr>

                                <tr>
                                    <h4>Quantity: </h4> {{$item->quantity}}             
                                </tr>

                                <tr>
                                    <h4>Sku: </h4> {{$item->sku}}             
                                </tr> <br/><br/>

                                <tr >
                                    {!! Form::open(['route' => 'shoppingcart.addtocart', 'data-parsley-validate' => '']) !!}
                        
                                    {{ Form::hidden('item_id', $item->id) }}
                                    {{ Form::submit('Add to Cart', ['class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px']) }}
        
                                    {!! Form::close() !!}
                                            {{--<a href="{{ route('shoppingcart.cart', $item->id) }}" class="btn btn-primary btn-sm">Add to Cart</a>--}}
                                </tr>
                            
                                                
                                
                        </tbody>
                    
                </div> <!-- end of .col-md-8 -->
            </div>
        
        </div><br>
    </div>


	

@endsection