<!DOCTYPE html>
<html>
<head>
    <title>Datatables Example | ALL data without ajax</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/>
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    
<div class="container mt-5">
    <h2 class="mb-4">Datatables Example | ALL data without ajax</h2>
    <a class="btn btn-primary" href="{{ URL::to('/students/generate-pdf') }}" target="_blank">Export to PDF</a>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Phone</th>
                <th>DOB</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $std)
            <tr>
                  <td>{{ $std->id }}</td>
                  <td>{{ $std->name }}</td>
                  <td>{{ $std->email }}</td>
                  <td>{{ $std->username }}</td>
                  <td>{{ $std->phone }}</td>
                  <td>{{ $std->dob }}</td>

            </tr>                  
            @endforeach
        </tbody>
    </table>
</div>
   
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script>
      $(document).ready(function () {
    $('#example').DataTable();
});
</script>

</html>