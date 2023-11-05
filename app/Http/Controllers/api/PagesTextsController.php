<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PagesTextsResource;
use App\Models\Pagestext;
use App\Traits\ResponseTraits;
class PagesTextsController extends Controller
{
    use ResponseTraits;

    public function index(Request $request)
    {
        $pagestexts = Pagestext::where($request->filters)->get();

        if (isset($pagestexts)) {
            $resource_data = PagesTextsResource::collection($pagestexts);
            $data = [
                "pagestexts" => $resource_data
            ];
            return $this->sendResponse($data, 'completed successfully',[]);
        } 
        else {
            return $this->sendError([],"error");
        }
        
    }
}
