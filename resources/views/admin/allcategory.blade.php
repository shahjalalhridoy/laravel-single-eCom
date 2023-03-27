@extends('admin.layouts.template')
@section('page_title')
    All Category | eCom
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category/</span> All Categories</h4>
        <div class="card">
            <h5 class="card-header">All Categories Information</h5>
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
                            <th>Category</th>
                            <th>Total Sub Category</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->sub_category_count }}</td>
                                <td>
                                    @if ($category->category_status == 1)
                                        <span class="alert alert-primary">Active</span>
                                    @else
                                        <span class="alert alert-danger">Deactivate</span>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{ route('editcategory', $category->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deletecategory', $category->id) }}"
                                        class="btn btn-warning">Delete</a>
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
            swal("Congratulation!", "{!! session()->get('message') !!}", "success", {
                button: "Ok"
            });
        </script>
    @endif
@endsection
