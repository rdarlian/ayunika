<?php

namespace App\Http\Controllers;

use App\Exports\GuestExport;
use App\Imports\GuestImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;


class ExcelImportController extends Controller
{
    public function import(Request $request)
    {

        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        // Get the uploaded file
        $file = $request->file('file');


        // Process the Excel file
        Excel::import(new GuestImport, $file);

        return redirect()->back()->with('success', 'Excel file imported successfully!');
    }
    public function export()
    {
        $id = Auth::id();
        return Excel::download(new GuestExport($id), 'Undangan.xlsx');
    }
}
