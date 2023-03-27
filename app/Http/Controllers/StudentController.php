<?php

namespace App\Http\Controllers;

use App\Models\Student;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PDF;

class StudentController extends Controller
{
    public function index()
    {
        //return view('user_template.data_table_Data');
        return view('admin.data_table_Data_NEW');

    }

    public function getStudents(Request $request)
    {
        if ($request->ajax()) {
            //$data = Student::latest()->get();
            //$data = Student::latest()->get();

            $data = Student::select(
                "students.*",
                "users.id AS user_id",
                "users.name AS userName",
                "role_user.role_id",
                "roles.display_name AS role_name",
            )
                ->join("users", "users.id", "=", "students.user_id")
                ->join("role_user", "role_user.user_id", "=", "students.user_id")
                ->join("roles", "roles.id", "=", "role_user.role_id")
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function WithOutDataTable()
    {
        $student = Student::latest()->get();
        return view('user_template.data_table_without', compact('student'));
    }

    // Generate PDF
    public function createPDF()
    {
        // retreive all records from db
        $data = Student::all();
        // share data to view
        view()->share('student', $data);
        $pdf = PDF::loadView('pdf_view', $data);
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }

    public function generatePDF()
    {
        //$users = Student::get();
        $users = Student::orderBy('id', 'asc')->limit(2000)->get();

        $data = [
            'title' => 'User List',
            'date' => date('m/d/Y'),
            'users' => $users,
        ];

        $pdf = PDF::loadView('user_template.myPDF', $data);
        return $pdf->stream('user_template.myPDF', $data);
        //return $pdf->download('laraveltuts.pdf');

        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();
    }

}
