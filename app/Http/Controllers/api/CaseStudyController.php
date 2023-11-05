<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CaseStudyResource;
use App\Models\CaseStudy;
use App\Traits\ResponseTraits;
class CaseStudyController extends Controller
{
    use ResponseTraits;

    public function index()
    {
        $casestudy = CaseStudy::all();

        if (isset($casestudy)) {
            $resource_data = CaseStudyResource::collection($casestudy);
            $data = [
                "casestudy" => $resource_data
            ];
            return $this->sendResponse($data, 'completed successfully',[]);
        } 
        else {
            return $this->sendError([],"error");
        }
        
    }
}
