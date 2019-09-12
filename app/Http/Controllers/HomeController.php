<?php

namespace App\Http\Controllers;

use App\Exports\WarehouseExport;
use App\Import\UserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function index(){
        return redirect('/admin/login');
    }

    public function demoExportExcel(){
        return Excel::download(new WarehouseExport(), 'agencies.xlsx');
    }

    public function import(){
        return view('import');
    }

    public function importPost(Request $request){
        //dd($request->all());
        //if($request->hasFile('import')){

            $path = $request->file('import')->getRealPath();
            //dd($path);
            Excel::import(new UserImport(), request()->file('import'));
        //}
    }
}
