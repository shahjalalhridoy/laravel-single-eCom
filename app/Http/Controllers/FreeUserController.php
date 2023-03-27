<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FreeUserController extends Controller
{
    public function FreeUserPage()
    {
        return view('user_template.free_user_page');
    }

    // public function DataTableData()
    // {
    //     return view('user_template.data_table_Data');
    // }
}
