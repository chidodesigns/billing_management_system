<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientPaymentProfile;
use App\Models\Service;
use App\Models\ServicePaymentRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class ClientPaymentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(Gate::allows('is-admin')){
            return view('admin.client-payments.index', [
                'client_payment_profiles' => ClientPaymentProfile::paginate(10)
            ]);
          }
    
          $request->session()->flash('error', 'You do not have access to this page');
          return redirect(('/'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $clientId = $request->query('id');

        return view('admin.client-payments.create', [
            'client' => Client::find($clientId)
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
            'client_name' => 'required|max:255',
            'recurrence_type' => 'required',
            'recurrence_date' => 'required', 
            'invoiced' => 'required',
            'direct_debit' => 'required',
            'payment_terms' => 'required',
            'client_id' => 'required',

        ]);

        $clientPaymentProfile = ClientPaymentProfile::create($validatedData);

        Log::info('A Client Paymnent Record Was Created: #ID'. $clientPaymentProfile->id);

        $request->session()->flash('success', 'You have created a new Client Payment Record');

        // return redirect(route('admin.client-payments.index'));

        return redirect(("admin/client-payments/{$clientPaymentProfile->id}"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientPaymentProfile = ClientPaymentProfile::find($id);

        //  Find Service Payment Records On Client Payment Profile 
        $clientServicePaymentRecords = ServicePaymentRecord::where('client_payment_profile_id', $id)->get();

        return view('admin.client-payments.show', [
            'client_payment_profile' => $clientPaymentProfile,
            'service_payment_records' => $clientServicePaymentRecords
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientPaymentProfile = ClientPaymentProfile::find($id);
        $client = Client::find($clientPaymentProfile->client_id);
        
        return view('admin.client-payments.edit', [
            'client' => $client,
            'client_payment_profile' => $clientPaymentProfile
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
        $clientPaymentProfile = ClientPaymentProfile::find($id);

        if(!$clientPaymentProfile){
            $request->session()->flash('error', 'You cannot edit this client payment record');
            return redirect(route('admin.client-payments.index'));
        }


        $clientPaymentProfile->update($validatedData = $request->only([
            'recurrence_type',
            'recurrence_date',
            'invoiced',
            'direct_debit',
            'payment_terms',

        ]));

        Log::info('A Client Paymnent Record Was Edited: #ID'. $clientPaymentProfile->id);

        $request->session()->flash('success', 'You have edited the client payment record');

        return redirect(("admin/clients/{$clientPaymentProfile->client_id}"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $clientPaymentProfile = ClientPaymentProfile::find($id);

        ClientPaymentProfile::destroy($id);

        Log::info('A Client Paymnent Record Was Deleted: #ID'. $clientPaymentProfile->id);

        $request->session()->flash('success', 'You have deleted the client payment profile');

        return redirect(route('admin.client-payments.index'));
    }
}
