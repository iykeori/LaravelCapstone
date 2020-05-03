@extends('common2') 

@section('pagetitle')
Details
@endsection

@section('pagename')
Product Detail 
@endsection

@section('scripts')
{!! Html::script('/bower_components/parsleyjs/dist/parsley.min.js') !!}

@endsection

@section('css')
{!! Html::style('/css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Shopping Cart</h1>
        </div>              
        <hr />       
    </div>
    <div class="container">
       
        <div>
            <div style="align:right">
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Shop More Items</a>
            </div>
            <hr>
            <div class="row">
                <table class="table">
                    <thead>
                        
                        <th>Item title</th>
                        <th>Price</th>
                        <th> Quantity</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($item2 as $Shopping)
                            @php /*dd($Shopping->id);*/ @endphp
                            <tr>
                                <td>{{$Shopping->item->title}}</td>
                                <td>{{$Shopping->itemprice->price}}</td>
                                <td>{{$Shopping->uquantity}}</td>
                                <td>
                                    {!! Form::model($Shopping, ['route' => ['shoppingcart.update_cart'], 'method'=>'PUT', 'data-parsley-validate' => '']) !!}
                                        {{ Form::text('uquantity', null, ['class'=>'form-control', 'style'=>'width:50px; display:inline-block', 
                                                                    'data-parsley-required'=>'']) }}
                                        {{ Form::hidden('cart_id', $Shopping->id)}}
                                        {{ Form::submit('Update', ['class'=>'btn btn-success', 'style'=>'margin-top:5px;width:150px']) }}            
                                    {!! Form::close() !!}
                                    {{-- <form action="{{ route('shoppingcart.update_cart', $Shopping->id) }}" method="POST">
                                        @csrf  
                                        @method('PUT')
                                        <input type="text" value="" name="uquantity" />
                                        <input type="submit" name="submit" value="submit" />
                                    </form> --}}
                                </td>
                                <td >
                                    {!! Form::model($Shopping, ['route' => ['shoppingcart.remove_item'], 'method'=>'DELETE', 'data-parsley-validate' => '']) !!}
                                        {{ Form::hidden('cart_id', $Shopping->id)}}
                                        {{ Form::submit('remove', ['class'=>'btn btn-danger', 'style'=>'margin-top:5px;width:150px']) }}            
                                    {!! Form::close() !!}

                                    {{--<a href="{{ route('products.remove_item', $Shopping->id) }}" class="btn btn-primary btn-sm" style='width:150px;margin-top:5px;'>Remove</a>--}}
                                
                                
                            </tr>
                            {{-- <div style="float:left; background-color:grey">

                                <h1>{{$totall += $Shopping->itemprice->price * $Shopping->uquantity}}</h1>
                            
                            </div> --}}
                        {{-- @endforeach --}}
                        @endforeach
                    </tbody>
                </table>
                    
                </div> <!-- end of .col-md-8 -->
                <div style="float:right; background-color:grey">
                    {{-- <h4>Sub Total: {{$total = ($Shopping->itemprice->price * $Shopping->uquantity )+ $total}}</h4> --}}
                    
                    @foreach ($item2 as $Shopping) 
                        

                    @php
                        $total = ($Shopping->itemprice->price * $Shopping->uquantity )+ $total
                    @endphp
                    

                    
                    
                        
                    @endforeach
                    <h4>Sub Total: {{$total}} </h4>
                </div>
                
                
            </div>

            {{-- <div style="float:left; background-color:grey">

                <h1>{{$total}}</h1>
            
            </div> --}}
            

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1>Enter Customer Infomation</h1>
                    <hr/>
        
                    {!! Form::open(['route' => 'products.check_order', 'data-parsley-validate' => '', 
                                    'files' => true]) !!}
                        
                        {{ Form::label('firstName', 'FirstName:') }}
                        {{ Form::text('firstName', null, ['class'=>'form-control', 'style'=>'', 
                                                      'data-parsley-required'=>'', 
                                                      'data-parsley-maxlength'=>'255']) }}
     
                        {{ Form::label('lastName', 'LastName:', ['style'=>'margin-top:20px']) }}
                        {{ Form::text('lastName', null, ['class'=>'form-control', 'style'=>'', 
                                                      'data-parsley-required'=>'']) }}
        
                        {{ Form::label('phone', 'Phone:', ['style'=>'margin-top:20px']) }}
                        {{ Form::text('phone', null, ['class'=>'form-control', 'style'=>'', 
                                                      'data-parsley-required'=>'']) }}
                                                      
                        {{ Form::label('email', 'Email:', ['style'=>'margin-top:20px']) }}
                        {{ Form::text('email', null, ['class'=>'form-control', 'style'=>'', 
                                                      'data-parsley-required'=>'']) }}
                        
                        {{-- {{ Form::hidden('cart_id', $Shopping->id)}} --}}
       
                        {{ Form::submit('Submit', ['class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px']) }}
        
                    {!! Form::close() !!}
        
                </div>
            </div>
        
        </div><br>
    </div>
   


	

@endsection