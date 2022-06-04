<?php

namespace App\Models;

use App\Models\ClientPaymentProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;

class Client extends Model
{
    use HasFactory, Searchable; 

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    public function clientPaymentProfile()
    {
        return $this->hasMany(ClientPaymentProfile::class);
    }


    public function toSearchableArray()
    {
        return [
            'company' => $this->company,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email
        ];
    }

}
