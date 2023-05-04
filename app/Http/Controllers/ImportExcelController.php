<?php

namespace App\Http\Controllers;

use Excel;
use Illuminate\Http\Request;
use App\Imports\ImportExcel;

class ImportExcelController extends Controller
{
    public function index()
    {
        return view('import_excel.index');
    }
    public function import(Request $request)
    {
        $request->validate([
            'excel' => 'required'
        ]);
        Excel::import(new ImportExcel, request()->file('excel'));
        return back()->with('success', 'Contacts imported successfully.');
    }
}
