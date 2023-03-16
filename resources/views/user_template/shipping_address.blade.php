@extends('user_template.layouts.template')
@section('main-content')
<div class="container" style="margin-top: 8rem;">
      <div class="">
<h2>Add Your Shipping Information </h2>
@if (session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="row">
      <div class="col-12">
            <div class="box_main">

                  <form action="{{ route('addshippinginfo') }}" method="POST">
                        @csrf
                        <div class="form-group">
                              <label for="address">Address:</label>
                              <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="form-group">
                        <label for="city_name">City:</label><br>
                        <input type="text" class="form-control" id="city_name" name="city_name">
                  </div>
                  <div class="form-group">
                        <label for="postal_code">Postal Code:</label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code">
                  </div>
                  <div class="form-group">
                        <label for="phone">Phone:</label><br>
                        <input type="text" class="form-control" id="phone" name="phone">
                  </div>
                  

                  <br>
                  <input class="btn btn-warning" type="submit" value="Next">

                        
                      </form>


            </div>
      </div>
</div>

      </div>
</div>
@endsection
