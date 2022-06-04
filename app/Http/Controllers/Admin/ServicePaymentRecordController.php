<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientPaymentProfile;
use App\Models\Service;
use App\Models\ServicePaymentRecord as ModelsServicePaymentRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ServicePaymentRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $clientPaymentProfile = $request->query('id');

        return view('admin.service-payments.create', [
            'client_payment_profile' => ClientPaymentProfile::find($clientPaymentProfile),
            'services' => Service::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'domain' => 'required',
            'registration_date' => 'required',
            'renewal_date' => 'required',
            'amount' => 'required',
            'service_id' => 'required',
            'client_payment_profile_id' => 'required'
        ]);

        //  Find Service Model From ID and Retrieve The service_type_name
        $service = Service::find($request->service_id);
        $serviceTypeName = $service->service_type_name;

        $servicePaymentRecord = ModelsServicePaymentRecord::create($validatedData);

        $servicePaymentRecord->service_type_name = $serviceTypeName;

        $servicePaymentRecord->save();

        $request->session()->flash('success', 'You have created a new Service Payment Record');

        Log::info('A Service Payment Record was created: ID#'. $servicePaymentRecord->id);
        
        return redirect(("admin/client-payments/{$servicePaymentRecord->client_payment_profile_id}"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $servicePaymentRecord = ModelsServicePaymentRecord::find($id);

        return view('admin.service-payments.edit', [
            'service_payment_record' => $servicePaymentRecord
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $servicePaymentRecord = ModelsServicePaymentRecord::find($id);

        if(!$servicePaymentRecord){
            $request->session()->flash('error', 'You cannot edit this service payment record');
            return redirect(route('/'));
        }

        $servicePaymentRecord->update($request->except([
            'token',
            'service_id',
            'service_type_name',
            'client_payment_profile_id'
        ]));

        $request->session()->flash('success', 'You have edited this service payment record');

        Log::info('A Service Payment Record was Edited: ID#'. $servicePaymentRecord->id);

        return redirect(("admin/client-payments/{$servicePaymentRecord->client_payment_profile_id}"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $servicePaymentRecord = ModelsServicePaymentRecord::find($id);

        ModelsServicePaymentRecord::destroy($id);

        Log::info('A Service Payment Record was deleted User: ID#'. $servicePaymentRecord->id);

        $request->session()->flash('success', 'You have deleted a service payment record');

        return redirect(route('admin.client-payments.index'));
    }
}
