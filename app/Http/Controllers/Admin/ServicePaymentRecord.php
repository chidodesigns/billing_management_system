<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientPaymentProfile;
use App\Models\Service;
use App\Models\ServicePaymentRecord as ModelsServicePaymentRecord;
use Illuminate\Http\Request;

class ServicePaymentRecord extends Controller
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

        //after creating the service payment record -> send the new service record id to the ClientPaymentProfile Model
        $validatedData = $request->validate([
            'domain' => 'required',
            'registration_date' => 'required',
            'renewal_date' => 'required',
            'amount' => 'required',
            'service_id' => 'required',
            'client_payment_profile_id' => 'required'
        ]);

        $servicePaymentRecord = ModelsServicePaymentRecord::create($validatedData);

        $request->session()->flash('success', 'You have created a new Service Payment Record');

        return redirect(route('admin.client-payments.index'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
