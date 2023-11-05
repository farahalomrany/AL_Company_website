<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
use App\Models\Employee;
use App\Models\EmployeesProject;
class EmployeeProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $projectemployee = new EmployeesProject();
        $input = $request->all();
        $validator = Validator::make($input, [
            'employee_id' => 'exists:employees,id',
            'project_id' => 'exists:projects,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $projectemployee->employee_id = $request->employee_id;
        $projectemployee->project_id = $request->project_id;

        $projectemployee->save();
        return redirect()->route('all_employeeproject', $request->project_id)->with('success', 'The Employee for Project has created successfully');

    }
    public function add(Request $request, $project_id)
    {      
        $emplprojs = Project::find($project_id)->employeesprojects;
        $ids = [];
        foreach($emplprojs as $s){
                array_push($ids, $s->employee_id);
        }
       
        $employees = Employee::whereNotIn('id',$ids)->get();
                    
        if(count($employees)>0)
        {
            return view('employeeproject.add', compact('employees', 'project_id'));
        }   
        else{
            return redirect()->route('all_employeeproject', $project_id)->with('error', 'This employees is empty or the project get all exist employees.');
        }
    }
    public function edit($id)
    {
        $employees = Employee::all();
        $projemployee = EmployeesProject::where('id', '=', $id)->first();
        return view('employeeproject.edit', compact('projemployee', 'employees'));
    }
    public function update($id, Request $request)
    {
        $projectemployee = EmployeesProject::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'employee_id' => 'exists:Employees,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $projectemployee->employee_id = $request->employee_id;

        $projectemployee->save();
        return redirect()->route('all_employeeproject', $projectemployee->project_id);
    }

    public function delete(Request $request, $id)
    {
        $projectemployee = EmployeesProject::find($id);
        $projid = $projectemployee->project_id;
        $projectemployee->delete();
        return redirect()->route('all_employeeproject', $projid)->with('success', 'This EmployeesProject has deleted successfully');
    }
    public function all_servie_for_project(Request $request, $id)
    {
        $project = Project::find($id);
        $projemployee = EmployeesProject::where('project_id', '=', $id)->get();
        return view('employeeproject.all', compact('projemployee', 'project'));

    }
   
}
