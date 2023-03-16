@extends('admin.layouts.template')
@section('page_title')
All Products | eCom
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products/</span> All Products</h4>
      <div class="card">
                <h5 class="card-header">All Products Information</h5>
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($products as $pro)
                        
                        <tr>
                              <td>{{ $pro->id }}</td>
                              <td>{{ $pro->product_category_name }}</td>
                              <td>{{ $pro->product_sub_category_name }}</td>
                              <td>{{ $pro->product_name }}</td>
                              <td>{{ $pro->product_price }}</td>
                              <td> 
                                <img width="80px" src="{{ asset($pro->product_image) }}">
                                <br>
                                {{-- <a href="{{ route('editproductimg', $pro->id) }}" class="btn btn-primary">Update Image</a> --}}
                                <button
                                type="button"
                                class="btn btn-sm btn-dark"
                                data-bs-toggle="modal"
                                data-bs-target="#basicModal_{{$pro->id}}"
                              >
                              Update Image
                              </button>
                              </td>
                              <td>
                                @if ($pro->product_status == 1)
                                    <span class="alert alert-primary">Active</span>
                                @else
                                    <span class="alert alert-danger">Deactivate</span>
                                @endif
                              </td>
                              <td>
                                    <a href="{{ route('editproduct', $pro->id) }}" class="btn btn-primary">Edit</a> 

                           


                                    <div class="modal fade" id="basicModal_{{$pro->id}}" tabindex="-1" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">Product Image Update</h5>
                                            <button
                                              type="button"
                                              class="btn-close"
                                              data-bs-dismiss="modal"
                                              aria-label="Close"
                                            ></button>
                                          </div>
                                          <div class="modal-body">

                                            <form action="{{ route('updateproductimg') }}" method="POST" enctype="multipart/form-data">
                                              @csrf
                                              <input type="hidden" value="{{ $pro->id }}" name="product_id">

                                            <div class="row">
                                              <div class="col mb-3">
                                                <label for="nameBasic" class="form-label">Previous Image</label>
                                                <img height="200px" src="{{ asset($pro->product_image) }}">
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col mb-3">
                                                <label for="nameBasic" class="form-label">New Product Image</label>
                                                <input class="form-control" name="product_image" type="file" id="product_image" />
                                              </div>
                                            </div>                                           
                                          </div>         
                                       
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                              Close
                                            </button>
                                              <button type="submit" class="btn btn-outline-primary">Update Image</button>
                                          </div>
                                        </form>


                                        </div>
                                      </div>
                                    </div>

                                    <a href="{{ route('deleteproduct', $pro->id) }}" class="btn btn-warning">Delete</a> </td>
                        </tr>
                        @endforeach
                   

                      
                    </tbody>
                  </table>
                </div>
              </div>
</div>
@endsection





