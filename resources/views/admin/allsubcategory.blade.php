@extends('admin.layouts.template')
@section('page_title')
    All Sub-Categories | eCom
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
                            <th>Sub Category</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($allsubcategories as $sub_cate)
                            <tr>
                                <td>{{ $sub_cate->id }}</td>
                                <td>{{ $sub_cate->category_name }}</td>
                                <td>{{ $sub_cate->sub_category_name }}</td>
                                <td>
                                    @if ($sub_cate->sub_category_status == 1)
                                        <span class="alert alert-primary">Active</span>
                                    @else
                                        <span class="alert alert-danger">Deactivate</span>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{ route('editsubcategory', $sub_cate->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deletesubcategory', $sub_cate->id) }}"
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
