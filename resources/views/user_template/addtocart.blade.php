@extends('user_template.layouts.template')
@section('main-content')

<div class="container" style="margin-top: 8rem;">
      <div class="">
<h2>All - Add To Cart Items </h2>
@if (session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="row">
      <div class="col-12">
            <div class="box_main">
                  <div class="table-responsive">
                        <table class="table">
                              <tr>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Unit Price</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Action</th>
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
                                                <th><a href="{{ route('deletecartitem', $item->id) }}" class="btn btn-warning">Remove</a> </td>
                                               
                                                
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
                                                    <td><a href="{{ route('shippingaddress') }}" class="btn btn-primary "> Checkout Now </a></td>                                                      
                                          </tr>
                                          @endif
                                                                      
                        </table>
                  </div>
            </div>
      </div>
</div>
      </div>
</div>


@endsection
