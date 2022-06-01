<?php

namespace App\Http\Helpers;

use App\Models\ClientPaymentProfile;
use App\Models\ServicePaymentRecord;

class Helper {

    public static function getClientPaymentProfiles($id)
    {
        $clientPaymentProfile = ClientPaymentProfile::where('client_id', $id)->get();;

        if($clientPaymentProfile){
            return $clientPaymentProfile;
        }

    }

    public static function getServicePaymentRecord($id)
    {
        $servicePaymentRecord = ServicePaymentRecord::where('client_payment_profile_id', $id)->get();

        if($servicePaymentRecord){
            return $servicePaymentRecord;
        }
    }

}