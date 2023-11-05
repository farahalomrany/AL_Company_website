<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\CaseStudy;

class CaseStudyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function allcaseforprojectid(Request $request, $id)
    {

        $cases = CaseStudy::where('project_id', '=', $id)->get();
        $project = Project::where('id',$id)->first();   
        return view('casestudy.allwithprojectid', compact('cases', 'id','project'));
    }
    public function addwithprojectid(Request $request, $id)
    {
        return view('casestudy.addwithprojectid', compact('id'));

    }

    public function storewithprojectid(Request $request)
    {
        $case = new CaseStudy();

        $case->analysis_phase = $request->analysis_phase;
        $case->design_phase = $request->design_phase;
        $case->development_phase = $request->development_phase;
        $case->test_phase = $request->test_phase;
        $case->project_id = $request->project_id;
        $id = $request->project_id;
        $case->save();
        return redirect()->to('casestudy/all/' . $id);

    }
    public function deletewithid(Request $request, $id)
    {
        $t = CaseStudy::find($id);

        $t->delete();
        return back()->with('success', 'This image has deleted successfully');
    }
    public function editcasewithprojectid($id)
    {
        $case = CaseStudy::where('id', '=', $id)->first();

        return view('casestudy.editwithprojectid', compact('case','id'));
    }
    public function updatecasewithprojectid($id, Request $request)
    {
        $case = CaseStudy::find($id);

        $case->analysis_phase = $request->analysis_phase;
        $case->design_phase = $request->design_phase;
        $case->development_phase = $request->development_phase;
        $case->test_phase = $request->test_phase;
        
        $case->save();
        $id = $case->project_id;
        return redirect()->to('casestudy/all/' . $id);
    }
   
}