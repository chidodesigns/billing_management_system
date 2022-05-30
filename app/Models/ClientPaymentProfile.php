<?php

namespace App\Models;

use App\Models\ServicePaymentRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientPaymentProfile extends Model
{

    use HasFactory;

         /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    public function clientPaymentProfileToServicePaymentRecord()
    {
        return $this->belongsToMany(ServicePaymentRecord::class);
    }


 
}
