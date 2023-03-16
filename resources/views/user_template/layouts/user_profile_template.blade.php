@extends('user_template.layouts.template')
@section('main-content')

<div class="container" style="margin-top: 8rem">
      <h2 style="text-align: center">Welcome, {{ Auth::user()->name }}</h2>
      <div class="row">
  
          <div class="com-lg-4">
              <div class="box_main">
                  <ul>
                      <li><a href="{{ route('userprofile') }}">Dasboard</a></li>
                      <li><a href="{{ route('userhistoryorders') }}">Total Order</a></li>
                      <li><a href="{{ route('userpendingorders') }}">Pendig Order</a></li>
                      <li><a href="{{ route('logout') }}">Logout</a></li>
                  </ul>
              </div>
  
          </div>
  
          <div class="com-lg-8">
              <div class="box_main">
  
                    @yield('user_profile_content')
  
              </div>
  
          </div>
  
      </div>
  </div>


@endsection()



