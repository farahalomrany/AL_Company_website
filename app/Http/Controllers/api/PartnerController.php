<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PartnerResource;
use App\Models\Partner;
use App\Traits\ResponseTraits;
class PartnerController extends Controller
{
    use ResponseTraits;

    public function index()
    {
        $partner = Partner::all();

        if (isset($partner)) {
            $resource_data = PartnerResource::collection($partner);
            $data = [
                "partners" => $resource_data
            ];
            return $this->sendResponse($data, 'completed successfully',[]);
        } 
        else {
            return $this->sendError([],"error");
        }
        
    }
}
