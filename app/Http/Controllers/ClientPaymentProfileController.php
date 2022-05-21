<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientPaymentProfileRequest;
use App\Http\Requests\UpdateClientPaymentProfileRequest;
use App\Models\ClientPaymentProfile;

class ClientPaymentProfileController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientPaymentProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientPaymentProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientPaymentProfile  $clientPaymentProfile
     * @return \Illuminate\Http\Response
     */
    public function show(ClientPaymentProfile $clientPaymentProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientPaymentProfile  $clientPaymentProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientPaymentProfile $clientPaymentProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientPaymentProfileRequest  $request
     * @param  \App\Models\ClientPaymentProfile  $clientPaymentProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientPaymentProfileRequest $request, ClientPaymentProfile $clientPaymentProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientPaymentProfile  $clientPaymentProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientPaymentProfile $clientPaymentProfile)
    {
        //
    }
}
