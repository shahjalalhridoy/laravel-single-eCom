@extends('admin.layouts.template')
@section('page_title')
Add Product | eCom
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product/</span> Add Product</h4>
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Add New Product</h5>
                        <small class="text-muted float-end">Input Information</small>
                    </div>
                    <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('storeproduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="category_id" name="category_id"
                                        aria-label="Default select example">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category )   
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>                                    
                                </div>
                            </div>

                            

                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-default-name">Sub Category Name</label>
                              <div class="col-sm-10">
                                <select class="form-select" id="sub_category_id" name="sub_category_id"
                                aria-label="Default select example">                                
                                <option value="">Select Sub Category</option> 
                                @foreach ($sub_categories as $sub_cat )   
                                <option value="{{ $sub_cat->id }}">{{ $sub_cat->sub_category_name }}</option>
                                @endforeach

                            </select>
                              </div>
                          </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="product_name"
                                        name="product_name" placeholder="Product Name" />
                                </div>
                            </div>

                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                              <div class="col-sm-10">
                                  <input type="number" class="form-control" id="product_price"
                                      name="product_price" placeholder="Price" />
                              </div>
                          </div>


                          <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-default-message">Short Description</label>
                              <div class="col-sm-10">
                                <textarea
                                  id="product_short_desc" name="product_short_desc"
                                  class="form-control"
                                  placeholder="Product Short Description"
                                  aria-label="Hi, Do you have a moment to talk Joe?"
                                  aria-describedby="basic-icon-default-message2"
                                ></textarea>
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-default-message">Long Description</label>
                              <div class="col-sm-10">
                                <textarea
                                id="product_long_desc" name="product_long_desc"
                                  class="form-control"
                                  placeholder="Product Long Description"
                                  aria-label="Hi, Do you have a moment to talk Joe?"
                                  aria-describedby="basic-icon-default-message2"
                                ></textarea>
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-default-message">Product Image</label>
                              <div class="col-sm-10">
                                    <input class="form-control" name="product_image" type="file" id="product_image" />
                              </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="product_qty"
                                        name="product_qty" placeholder="Quantity" />
                                </div>
                            </div>

                            

                            

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


    
@endsection


