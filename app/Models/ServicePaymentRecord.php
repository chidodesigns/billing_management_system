<?php

namespace App\Models;

use App\Models\ClientPaymentProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServicePaymentRecord extends Model
{
    use HasFactory;

            /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    public function addServicePaymentRecordToClientPaymentProfile()
    {
        return $this->belongsTo(ClientPaymentProfile::class);
    }
    
}
