<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PagesImagesResource;
use App\Models\Pagesimage;
use App\Traits\ResponseTraits;
class PagesImagesController extends Controller
{
    use ResponseTraits;

    public function index(Request $request)
    {
        $pagesimages = Pagesimage::where($request->filters)->get();

        if (isset($pagesimages)) {
            $resource_data = PagesImagesResource::collection($pagesimages);
            $data = [
                "pagesimages" => $resource_data
            ];
            return $this->sendResponse($data, 'completed successfully',[]);
        } 
        else {
            return $this->sendError([],"error");
        }
        
    }
}
