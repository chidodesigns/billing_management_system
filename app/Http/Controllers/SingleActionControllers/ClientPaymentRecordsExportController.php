<?php

namespace App\Http\Controllers\SingleActionControllers;

use App\Exports\ClientPaymentRecordsExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientPaymentRecordsExportController extends Controller
{
    public function __invoke(Request $request)
    {
        return new ClientPaymentRecordsExport();
    }
}
