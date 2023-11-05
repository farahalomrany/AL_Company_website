<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use App\Models\Imagesconfig;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use App\Traits\ImageSaveTrait;
class EmployeeController extends Controller
{
    use ImageSaveTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $emply = new Employee();
        $input = $request->all();

        $validator = Validator::make($input, [
            'full_name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255',
            'job_title' => 'required|min:2',
            'pre_name' => 'nullable',
            'description' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $emply->full_name = $request->full_name;
        $emply->pre_name = $request->pre_name;
        if (isset($request->profile_photo)) {

            $emply->profile_photo = $this->check_validation_and_save_croped_image($request, "employees", "profile_photo", "Employees");

        }
      
        $emply->job_title = $request->job_title;
        $emply->description = $request->description;

        $emply->save();
        return redirect('/employees');

    }
    public function add(Request $request)
    {

        return view('employee.add');

    }
    public function edit($id)
    {
        $emply = Employee::where('id', '=', $id)->first();
        return view('employee.edit', compact('emply'));
    }
    public function update($id, Request $request)
    {
        $emply = Employee::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'full_name' => 'regex:/^[\pL\s\-]+$/u|min:3|max:255',
            'job_title' => 'min:2',
            'pre_name' => 'nullable',
            'description' => 'nullable'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $emply->full_name = $request->full_name;
        $emply->pre_name = $request->pre_name;
        if ($request->chechbox == "on") {
            $emply->profile_photo = null;
        }
        if (isset($request->profile_photo)) {

            $emply->profile_photo = $this->check_validation_and_save_croped_image($request, "employees", "profile_photo", "Employees");

        }
        $emply->job_title = $request->job_title;
        $emply->description = $request->description;
        $emply->save();
        return redirect('/employees');
    }

    public function delete(Request $request, $id)
    {
        $emply = Employee::find($id);
        $emply->delete();
        return redirect('/employees')->with('success', 'This employee has deleted successfully');
    }

    public function all(Request $request)
    {
        $emply = Employee::all();
        return view('employee.all', compact('emply'));

    }
}