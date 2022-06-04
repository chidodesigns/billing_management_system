<?php

namespace App\Exports;

use App\Models\ClientPaymentProfile;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Support\Responsable;

class ClientPaymentRecordsExport implements FromCollection, Responsable, WithHeadings
{
    use Exportable;

    /**
    * It's required to define the fileName within
    * the export class when making use of Responsable.
    */
    private $fileName = 'client-payment-records.csv';
    
    /**
    * Optional Writer Type
    */
    private $writerType = Excel::CSV;

    /**
     * Optional Excel Header
     */
    private $headings = true;
    
    /**
    * Optional headers
    */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];


    public function headings(): array 
    {
        return [
            '#',
            'client_name',
            'recurrence_type',
            'recurrence_date',
            'invoiced',
            'direct_debit',
            'payment_terms',
            'client_id',
            'created_at',
            'updated_at'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ClientPaymentProfile::all();
    }
}
