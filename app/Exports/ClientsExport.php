<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClientsExport implements FromCollection, Responsable, WithHeadings
{
    use Exportable;

        /**
    * It's required to define the fileName within
    * the export class when making use of Responsable.
    */
    private $fileName = 'clients.csv';
    
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
            'company',
            'free_agent_id',
            'firstname',
            'lastname',
            'email',
            'telephone',
            'created_at',
            'updated_at'
        ];
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Client::all();
    }
}
