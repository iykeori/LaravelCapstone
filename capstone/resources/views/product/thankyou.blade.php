@extends('common2') 

@section('pagetitle')
Item List
@endsection

@section('pagename')
Thank you
@endsection

@section('content')

    <div class="container">
        <h2> Receipt </h2>
        <hr>

        <div class="row" >
            <div class="table-responsive-lg">
                <table class="table">
                    <thead>                                                
                        {{-- <th>Items Ordered</th>
                        <th>&nbsp;&nbsp;&nbsp;</th>
                        <th> Cost of Order </th>
                        <th>&nbsp;&nbsp;&nbsp;</th> --}}
                        <th>First Name</th>
                        <th>&nbsp;&nbsp;&nbsp;</th>
                        <th>Last Name</th>
                        <th>&nbsp;&nbsp;&nbsp;</th>
                        <th>Phone No</th>
                        <th>&nbsp;&nbsp;&nbsp;</th>
                        <th>Email</th>
                        <th>&nbsp;&nbsp;&nbsp;</th>
                    </thead>
                    <tbody>
                        <tr>   
                            {{-- @foreach ($items_ordered as $item_order)
                            
                              {{$number = ($item_order->squanitity) + $number}}
                              {{$sum = ($item_order->squanitity * $item_order->price) + $sum}}
                            
                            @endforeach --}}
                          
                            {{-- <td>{{ $number }}</td>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td>{{ $sum }}</td>
                            <td>&nbsp;&nbsp;&nbsp;</td> --}}


                            <td>{{$order->firstName}}</td>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td>{{$order->lastName}}</td>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td>{{$order->email}}</td>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td>{{$order->phone}}</td>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                         
                        </tr>                    
                    </tbody>
                </table>

                <table class="table">
                    <thead>
                        
                        <th>Item Price</th>
                        <th>&nbsp;&nbsp;&nbsp;</th>
                        <th> Item title</th>
                        <th>&nbsp;&nbsp;&nbsp;</th>
                        
                    </thead>
                    <tbody>
                          
                            @foreach ($items_ordered as $itemorder)
                                <tr> 
                                    <td>${{$itemorder->price}}</td>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                
                                    <td>{{$itemorder->item->title}}</td> 
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                </tr>
                            @endforeach 
                          
                    </tbody>
                </table>

            </div> <!-- end of .col-md-8 -->
        </div>
    </div>
@endsection