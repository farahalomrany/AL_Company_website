<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use App\Traits\ResponseTraits;
class EmployeeController extends Controller
{
    use ResponseTraits;

    public function index(Request $request)
    {
        $employee = Employee::where($request->filters)->get();

        if (isset($employee)) {
            $resource_data = EmployeeResource::collection($employee);
            $data = [
                "employees" => $resource_data
            ];
            return $this->sendResponse($data, 'completed successfully',[]);
        } 
        else {
            return $this->sendError([],"error");
        }
        
    }
}
