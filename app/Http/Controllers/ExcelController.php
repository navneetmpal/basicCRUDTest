<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\TpSchemeExport;
use App\Imports\TPImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TpScheme;
use App\Models\User;




class ExcelController extends Controller
{
    //

    public function index()
    {
        // $users = User::get()->paginate(5);
        $users = User::paginate(10);
  
        return view('excelImport', compact('users'));
    }

    public function export() 

    {

        return Excel::download(new TpSchemeExport, 'users.xlsx');

    }





    public function import() 
    {
        // Resolve Excel instance and call import
        Excel::import(new TPImport,request()->file('file'));



        return back()->with('success', 'File imported successfully!');
    }




}
