<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AskForServiceResource;
use App\Traits\ResponseTraits;
use Illuminate\Http\Request;
use App\Models\AskForService;
use Illuminate\Support\Facades\Validator;
class AskForServiceController extends Controller
{
    use ResponseTraits;
    public function send(Request $request)
    {
        $askservice = new AskForService();
        $input = $request->all();
 
        $validator = Validator::make($input, [
            'email' => 'required|email',
            'full_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2|max:255',
            'service_description' => 'required',
            'phone' => 'min:9',
            'budget' => 'nullable|numeric'
        ]);

        if ($validator->fails()) {
            return $this->sendError([], $validator->errors()->first());

        }
        $askservice->email = $request->email;
        $askservice->full_name = $request->full_name;
        $askservice->service_description = $request->service_description;
        $askservice->phone = $request->phone;
        $askservice->budget = $request->budget;
        $askservice->save();
        if (isset($askservice)) {
            $resource_data = new AskForServiceResource($askservice);
            $data = [
                "ask_for_services" => $resource_data
            ];
            return $this->sendResponse($data, 'completed successfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
}
