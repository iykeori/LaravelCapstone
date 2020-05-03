@extends('common2') 

@section('pagetitle')
Order List
@endsection

@section('pagename')
View Order Page
@endsection

@section('content')

    <div class="container">
        <h2> Click Order to View </h2>
        <hr>

        <div class="row" >
            <div class="table-responsive-lg">
                <table class="table">
                    <thead>
                        
                        
                        <th>Orders</th>
                        <th>&nbsp;&nbsp;&nbsp;</th>
                       
                    </thead>
                    <tbody>
                          
                                                   

                            @foreach ($viewOrder as $order)
                            
                            <tr>       
                                <td><h4><a href="{{ route('products.thankyou', $order->id) }}"> Order {{$order->id}} </a></h4></td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                              
                            </tr>
                            @endforeach
                          

                          
                        
                    

                    </tbody>
                </table>

                




            </div> <!-- end of .col-md-8 -->
        </div>
    </div>
@endsection