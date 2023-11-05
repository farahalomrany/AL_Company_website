<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use App\Http\Resources\ConfigResource;
use App\Traits\ResponseTraits;
class ConfigController extends Controller
{
    use ResponseTraits;

    public function index(Request $request)
    {
        $config = Config::where($request->filters)->get();

        if (isset($config)) {
            $resource_data = ConfigResource::collection($config);
            $data = [
                "configs" => $resource_data
            ];
            return $this->sendResponse($data, 'completed successfully',[]);
        } 
        else {
            return $this->sendError([],"error");
        }
        
    }
}
