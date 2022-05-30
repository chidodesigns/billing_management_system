<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientPaymentProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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

        $validatedData = $request->only([
            'client_name',
            'recurrence_type',
            'recurrence_date',
            'invoiced',
            'direct_debit',
            'payment_terms',
            'client_id',

        ]);

        $clientPaymentProfile = ClientPaymentProfile::create($validatedData);

        $request->session()->flash('success', 'You have created a new Client Payment Record');

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
        $clientPaymentProfile = ClientPaymentProfile::find($id);

        return view('admin.client-payments.show', [
            'client_payment_profile' => $clientPaymentProfile
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

        $request->session()->flash('success', 'You have edited the client payment record');

        return redirect(route('admin.client-payments.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        ClientPaymentProfile::destroy($id);

        $request->session()->flash('success', 'You have deleted the client payment profile');

        return redirect(route('admin.client-payments.index'));
    }
}
