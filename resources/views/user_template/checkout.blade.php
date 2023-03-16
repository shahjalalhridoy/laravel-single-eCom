@extends('user_template.layouts.template')
@section('main-content')

<div class="container" style="margin-top: 8rem;">
      <div class="">
<h2>Final Step To place Your Order </h2>
@if (session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="row">
      <div class="col-12">
            <div class="box_main">

                  <div class="row">
                        <div class="col-7">
                              <table class="table">
                                    <tr style="background-color: #ccc; font-size: 18px;">
                                          <th colspan="5" style="text-align: center">Cart Items</th>
                                    </tr>
                                    <tr>
                                          <th>Product Name</th>
                                          <th>Product Image</th>
                                          <th>Unit Price</th>
                                          <th>Qty</th>
                                          <th>Price</th>
                                         
                                    </tr>
                                    @php
                                          $total =0;
                                    @endphp
                                         
                                                @foreach ($cart_items as $item)
                                                <tr>
                                                      <th>{{ $item->product_name }}</th>
                                                      <th><img src="{{ asset($item->product_image) }}" width="80px"></th>
                                                      <th>{{ $item->product_price }}</th>
                                                      <th>{{ $item->pro_qty }}</th>
                                                      <th>{{ $item->total_price }}</th>                                                     
                                                </tr>
                                                @php
                                                      $total = $total + $item->total_price;
                                                @endphp                                        
      
      
                                                @endforeach
                                                @if($total > 0) 
                                                <tr style="background-color: #ccc; font-size: 18px;">
                                                      <td colspan="2" style="text-align: right">Total</td>
                                                      <td>{{ $total  }}</td>
                                                      <td></td>
                                                      <td></td>  
                                                                                                          
                                                </tr>
                                                @endif
                                                                            
                              </table>


                        </div>
                        <div class="col-5">

                              @foreach ($shipping_info as $s)

                              <table class="table">
                                    <tr style="background-color: #ccc; font-size: 18px;">
                                          <td colspan="2" style="text-align: center">Shipping Info</td>
                                    </tr>
                                    <tr>
                                          <th>Address</th>
                                          <th>{{ $s->address }}</th>                                         
                                    </tr>
                                    <tr>
                                          <th>City</th>
                                          <th>{{ $s->city_name }}</th>                                         
                                    </tr>
                                    <tr>
                                          <th>Postal Code</th>
                                          <th>{{ $s->postal_code }}</th>                                         
                                    </tr>
                                    <tr>
                                          <th>Phone No</th>
                                          <th>{{ $s->phone }}</th>                                         
                                    </tr>

                              </table>

                              {{-- <p>Address: {{ $s->address }}</p>
                              <p>City: {{ $s->city_name }}</p>
                              <p>Postal Code: {{ $s->postal_code }}</p>
                              <p>Phone No: {{ $s->phone }}</p> --}}


                                    
                              @endforeach
                              
                        </div>
                  </div>

                  <div class="row">

                  <form action="{{ route('placeorder') }}" method="POST">
                        @csrf
                        <input  type="hidden" value="{{ $total }}" name="total_price">
                        <input class="btn btn-primary" type="submit" value="Confirm Order">                        
                  </form>

                  <form action="{{ route('addshippinginfo') }}" method="POST">
                        @csrf                        
                        <input class="btn btn-warning" type="submit" value="Cancel Order" style="margin-left: 20px;">
                  </form>
            </div>


            </div>
      </div>
</div>
      </div>
</div>
@endsection
