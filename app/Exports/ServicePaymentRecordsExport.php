<?php

namespace App\Exports;

use App\Models\ServicePaymentRecord;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;

class ServicePaymentRecordsExport implements FromCollection, Responsable, WithHeadings
{
    use Exportable;

     /**
    * It's required to define the fileName within
    * the export class when making use of Responsable.
    */
    private $fileName = 'service-payment-records.csv';
    
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
            'domain',
            'registration_date',
            'renewal_date',
            'amount',
            'notes',
            'service_type_name',
            'service_id',
            'client_payment_profile_id',
            'created_at',
            'updated_at'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ServicePaymentRecord::all();
    }
}
