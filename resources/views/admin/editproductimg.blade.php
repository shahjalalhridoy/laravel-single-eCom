@extends('admin.layouts.template')
@section('page_title')
    Edit Product Image | eCom
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product/</span> Edit Product Image</h4>
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Product Image</h5>
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

                        <form action="{{ route('updateproductimg') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $productInfo->id }}" name="product_id">
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-default-message">Previous Image</label>
                              <div class="col-sm-10">
                                    <img height="200px" src="{{ asset($productInfo->product_image) }}">
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-default-message">New Product Image</label>
                              <div class="col-sm-10">
                                    <input class="form-control" name="product_image" type="file" id="product_image" />
                              </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update Product Image</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
