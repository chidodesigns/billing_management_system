<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
     /**
     * Search for a Client in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'search_term' => 'required'
        ]);

        $searchedClients = Client::search($data['search_term'])->paginate();

        Log::info('A Client Was Searched For: Search Term:'. $data['search_term']);

        return view('admin.clients.search',[
            'search_results' => $searchedClients
        ]);
    }
}
