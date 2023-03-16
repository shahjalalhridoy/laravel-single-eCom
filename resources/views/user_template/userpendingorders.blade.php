@extends('user_template.layouts.user_profile_template')
@section('user_profile_content')

<h1>User Pending Order List </h1>

@if (session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="row">
    <div class="col-12">
          <div class="box_main">

            <table class="table">
            <tr style="background-color: #ccc; font-size: 18px;">
                  <th colspan="5" style="text-align: center">Cart Items</th>
            </tr>
            <tr>
                  <th>Order ID</th>
                  <th>Order Date</th>
                  <th>Total Price</th>
                  <th>Shipping Address</th>
                 
            </tr>
           
                        @foreach ($pending_orders as $item)
                        <tr>
                              <th>{{ $item->id }}</th>                             
                              <th>{{ $item->order_date }}</th>
                              <th>{{ $item->total_price }}</th>
                              <th>{{ $item->shipping_address }}</th>                                                     
                        </tr>
                        @endforeach
                        
                       
                                                    
      </table>
          </div>
    </div>
</div>
</div>
</div


@endsection

