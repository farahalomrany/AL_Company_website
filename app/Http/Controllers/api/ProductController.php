<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Traits\ResponseTraits;
class ProductController extends Controller
{
    use ResponseTraits;

    public function index(Request $request)
    {
        $product = Product::where($request->filters)->get();

        if (isset($product)) {
            $resource_data = ProductResource::collection($product);
            $data = [
                "products" => $resource_data
            ];
            return $this->sendResponse($data, 'completed successfully',[]);
        } 
        else {
            return $this->sendError([],"error");
        }
        
    }
}
