@extends('admin.layouts.template')
@section('page_title')
Pending Orders | eCom
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pending Orders/</span> All Products</h4>
      <div class="card">
                <h5 class="card-header">All Pending Order Information</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>Id</th>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>User</th>
                        <th>Total Price</th>
                        <th>Shipping Address</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                      @php
                        $a=1;
                      @endphp

                      @foreach ($pending_orders as  $item)
                        
                      
                     
                        <tr>
                          <th>@php
                            echo $a
                          @endphp
                          </th>                             

                          <th>{{ $item->id }}</th>                             
                          <th>{{ $item->order_date }}</th>
                          <th>{{ $item->name }}</th>
                          <th>{{ $item->total_price }}</th>

                          <th>{{ $item->shipping_address }}</th>                            
                     
                              <td>
                                    <a href="" class="btn btn-primary">Edit</a> 
                                    <a href="" class="btn btn-warning">Delete</a> 
                                  </td>
                        </tr>
                        @php
                          $a++;
                        @endphp

                        @endforeach
                   

                      
                    </tbody>
                  </table>
                </div>
              </div>
</div>
@endsection







