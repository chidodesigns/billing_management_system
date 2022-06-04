<?php

namespace App\Http\Controllers\SingleActionControllers;

use App\Exports\ServicePaymentRecordsExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicePaymentRecordsExportController extends Controller
{
    public function __invoke(Request $request)
    {
        return new ServicePaymentRecordsExport();
    }
}
