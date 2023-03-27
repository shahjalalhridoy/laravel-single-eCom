@extends('admin.layouts.template')
@section('page_title')
    All Users | eCom
@endsection
@section('content')

@include('sweetalert::alert')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users/</span> All Users</h4>
        <div class="card">
            <h5 class="card-header">All Users Information</h5>
            {{-- @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif --}}
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>User Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    @if ($user->role_name == 'Admin')
                                        <span class="badge rounded-pill bg-primary">Admin</span>
                                    @elseif ($user->role_name == 'User')
                                        <span class="badge rounded-pill bg-info">User</span>
                                    @elseif ($user->role_name == 'FreeUser')
                                        <span class="badge rounded-pill bg-dark">Free User</span>
                                    @endif
                                    {{-- {{ $user->role_name }} --}}
                                </td>


                                <td>
                                    @if ($user->user_status == 'Active')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Deactivate</span>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{ route('editcategory', $user->user_id) }}" class="btn btn-primary">Edit</a>

                                    @if ($user->user_status == 'Active')
                                        <button type="button" class="btn btn-md btn-info" data-bs-toggle="modal"
                                            data-bs-target="#ActiveModal_{{ $user->user_id }}">
                                            Active To Deactivate
                                        </button>

                                        <div class="modal fade" id="ActiveModal_{{ $user->user_id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel1">User Status Update
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="{{ route('userstatusactive') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" value="{{ $user->user_id }}"
                                                                name="user_id">
                                                            <div style="text-align: center">
                                                                <h1 style="color:red">Deactivate Account</h1>
                                                                <p>Are you sure you want to delete your account?</p>
                                                                <hr>
                                                            </div>


                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-danger"
                                                                    data-bs-dismiss="modal">
                                                                    Close
                                                                </button>
                                                                <button type="submit"
                                                                    class="btn btn-outline-primary">Confirm</button>
                                                            </div>
                                                        </form>


                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <button type="button" class="btn btn-md btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#ActiveModal_{{ $user->user_id }}">
                                                Deactivate To Active
                                            </button>

                                            <div class="modal fade" id="ActiveModal_{{ $user->user_id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel1">User Status
                                                                Update</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form action="{{ route('userstatusdeactive') }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" value="{{ $user->user_id }}"
                                                                    name="user_id">
                                                                <div style="text-align: center">
                                                                    <h1 style="color:green">Active Account</h1>
                                                                    <p>Are you sure you want to activate your account?</p>
                                                                    <hr>
                                                                </div>


                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-outline-danger"
                                                                        data-bs-dismiss="modal">
                                                                        Close
                                                                    </button>
                                                                    <button type="submit"
                                                                        class="btn btn-outline-primary">Confirm</button>
                                                                </div>
                                                            </form>


                                                        </div>
                                                    </div>
                                                </div>
                                    @endif
                                    {{-- <button type="button" class="btn btn-md btn-info" data-bs-toggle="modal"
                                        data-bs-target="#ActiveModal_{{ $user->user_id }}">
                                        Active To Deactivate
                                    </button>

                                    <div class="modal fade" id="ActiveModal_{{ $user->user_id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">User Status Update</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="{{ route('userstatusactive') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" value="{{ $user->user_id }}"
                                                            name="user_id">
                                                        <div style="text-align: center">
                                                            <h1 style="color:red">Deactivate Account</h1>
                                                            <p>Are you sure you want to delete your account?</p>
                                                            <hr>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-danger"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit"
                                                                class="btn btn-outline-primary">Confirm</button>
                                                        </div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div> --}}


                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    @if (session()->has('message'))
      <script>
          swal("Congratulation!", "{!!session()->get('message')!!}", "success", {
            button: "Ok"
          });
        </script>
@endif
@endsection
