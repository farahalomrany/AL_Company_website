<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use App\Traits\ResponseTraits;
class ServiceController extends Controller
{
    use ResponseTraits;

    public function index(Request $request)
    {
        $service = Service::where($request->filters)->get();

        if (isset($service)) {
            $resource_data = ServiceResource::collection($service);
            $data = [
                "services" => $resource_data
            ];
            return $this->sendResponse($data, 'completed successfully',[]);
        } 
        else {
            return $this->sendError([],"error");
        }
        
    }
}
