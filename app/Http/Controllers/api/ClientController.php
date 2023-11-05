<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Traits\ResponseTraits;
class ClientController extends Controller
{
    use ResponseTraits;

    public function index()
    {
        $client = Client::all();

        if (isset($client)) {
            $resource_data = ClientResource::collection($client);
            $data = [
                "clients" => $resource_data
            ];
            return $this->sendResponse($data, 'completed successfully',[]);
        } 
        else {
            return $this->sendError([],"error");
        }
        
    }
}
