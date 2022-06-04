<?php

namespace App\Http\Controllers\SingleActionControllers;

use App\Exports\ClientsExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;

// use Maatwebsite\Excel\Excel;

class ExportController extends Controller
{
    public function __invoke(Request $request)
    {
     
        return new ClientsExport();
    }
}
