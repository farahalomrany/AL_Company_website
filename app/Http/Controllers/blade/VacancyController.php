<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VacanciesAccount;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class VacancyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $vac = new Vacancy();
      
        $input = $request->all();

        $validator = Validator::make($input, [
            'job_title' => 'required|min:2|max:255',
            'job_description' => 'required|min:2',
            'is_open' => 'nullable',
        ]);
      
        if ($validator->fails()) {
            return redirect()->back()->with('error',$validator->errors()->first());
        }
        $vac->job_title = $request->job_title;
        $vac->job_description = $request->job_description;
        $vac->is_open = $request->is_open;

        $vac->save();
        return redirect('/vacancies');

    }
    public function add(Request $request)
    {
        return view('vacancies.add');

    }
    public function edit($id)
    {
        $vac = Vacancy::where('id', '=', $id)->first();
        return view('vacancies.edit', compact('vac'));
    }
    public function update($id,Request $request){
        $vac = Vacancy::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'job_title' => 'required|min:2|max:255',
            'job_description' => 'required|min:2',
            'is_open' => 'nullable',
        ]);
      
        if ($validator->fails()) {
            return redirect()->back()->with('error',$validator->errors()->first());
        }
        $vac->job_title = $request->job_title;
        $vac->job_description = $request->job_description;
        $vac->is_open = $request->is_open;

        $vac->save(); 
       return redirect('/vacancies');
      }

    public function delete(Request $request, $id)
    {
        $vac = Vacancy::find($id);
        $vac->delete();
        return redirect('/vacancies')->with('success', 'This Vacancy has deleted successfully');
    }

    public function all(Request $request)
    {
        $vac = Vacancy::all();
        return view('vacancies.all', compact('vac'));

    }
    public function applications($id)
    {
        $vac = Vacancy::where('id', '=', $id)->first();
        if(!isset($vac)){
            return redirect('/vacancies')->with('error', 'There Is No Applicants');
        }else{
            $vacacc = $vac->vacancyaccounts;
        }

        return view('vacancies.applications', compact('vacacc' ,'vac'));
    }
    //updaytye status in Vacancy Account
    public function status_update(Request $request, $id)
    {
        $vac = VacanciesAccount::findOrFail($id);
        $vac->status = $request->input('status');
        $vac->save();
    
        return response()->json(['message' => 'Status updated successfully']);
    }
   
    public function application_details($id)
    {
        $user = User::where('id', '=', $id)->first();
        
        return view('vacancies.applicationdetails', compact('user'));
    }
}
