@extends('admin.layouts.template')
@section('page_title')
Admin Dashboard | Admin Profile 
@endsection
@section('content')

<x-app-layout>
      {{-- <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
              {{ __('Profile') }}
          </h2>
      </x-slot> --}}

      
  
      <div class="py-12">



          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
              <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                  {{-- <div class="max-w-xl"> --}}
                  <div class="">
                        {{-- @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{ session()->get('status') }}
                        </div>
                    @endif --}}

                      {{-- @include('profile.partials.update-profile-information-form') --}}
                      @include('profile.partials.update-profile-information-form-2')

                  </div>
              </div>
  
              {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                  <div class="max-w-xl">
                      @include('profile.partials.update-password-form')
                  </div>
              </div> --}}
  
              {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                  <div class="max-w-xl">
                      @include('profile.partials.delete-user-form')
                  </div>
              </div> --}}
          </div>
      </div>
  </x-app-layout>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  @if (session()->has('status'))
    <script>
        swal("Congratulation!", "{!!session()->get('status')!!}", "success", {
          button: "Ok"
        });
      </script>
  @endif

@endsection

