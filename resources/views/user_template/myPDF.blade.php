<!DOCTYPE html>
<html>

<head>
    <title>Laravel 9 Create PDF File using DomPDF Tutorial - LaravelTuts.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/>
    <style>
      body{
            font-size: 13px;
      }
        table,
        th,
        td {
            border: 1px solid #595959;
            border-collapse: collapse;
            padding: 5px;
        }

        thead {
            background: #ccc;
        }

        th {
            background: #BFD6F9;
        }

        .even {
            background: #fbf8f0;
        }

        .odd {
            background: #fefcf9;
        }

        @page {
                margin: 100px 25px;
            }

            header {
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;
                font-size: 20px !important;
                background-color: #165ac0;
                color: white;
                text-align: center;
                line-height: 35px;
            }

            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 40px; 
                font-size: 14px !important;
                /* background-color: #000; */
                color: #165ac0;
                text-align: center;
                line-height: 35px;
            }

            .center {
  margin-left: auto;
  margin-right: auto;
}
    </style>

</head>

<body>

      <header>
            <h1>{{ $title }}</h1>
            {{-- <p>{{ $date }}</p> --}}
        </header>

        <footer>
            <hr>
            Copyright © <?php echo date("Y");?> - All rights reserved.
        </footer>
    
   

    {{-- <table class="table table-bordered"> --}}
      <table class="center" >
        <tr style="text-align: center">
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Phone</th>
            {{-- <th>DOB</th> --}}
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->phone }}</td>
                {{-- <td>{{ $user->dob }}</td> --}}

            </tr>
        @endforeach
    </table>
</body>

</html>
