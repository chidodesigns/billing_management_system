<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ClientsExport;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Gate::allows('is-admin')){
            return view('admin.clients.index', [
                'clients' => Client::paginate(10)
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
    public function create()
    {
        return view('admin.clients.create');
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
            'company' => 'required|max:255',
            // 'free_agent_id' => 'required',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|max:255|unique:clients',
            'telephone' => 'required|max:11',
        ]);

        $client = Client::create($validatedData);


        /**
         *  Laravel Scout will automatically persist the
         *  changes to your Algolia search index.
         */
        $client->update();

        $request->session()->flash('success', 'You have created a new client');


        Log::info('A Client Was Created: #ID'. $client->id);

        
        return redirect(("admin/clients/{$client->id}"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        
        return view('admin.clients.show', [
            'client' => $client
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('admin.clients.edit', [
            'client' => $client
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
        $client = Client::find($id);

        if(!$client){
            $request->session()->flash('error', 'You cannot edit this client');
            return redirect(route('admin.clients.index'));
        }

        $client->update($request->except([
            'token',
        ]));

        
        Log::info('A Client Was Edited: #ID'. $client->id);

        $request->session()->flash('success', 'You have edited the client');

        return redirect(("admin/clients/{$client->id}"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {   
        $client =  Client::find($id);

        Client::destroy($id);

        $request->session()->flash('success', 'You have deleted the user');

        Log::info('A Client Was Deleted: #ID'. $client->id);

        return redirect(route('admin.clients.index'));
    }

}
