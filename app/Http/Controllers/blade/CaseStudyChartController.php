<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Http\Request;
use App\Models\CaseStudiesChart;
use Illuminate\Support\Str;

class CaseStudyChartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function allcasechforcaseid(Request $request, $id)
    {
        $ch = CaseStudiesChart::where('case_study_id', '=', $id)->get();
        $casestudy = CaseStudy::where('id', '=', $id)->first();
        $project_id = $casestudy->project_id;
        return view('csch.allwithcaseid', compact('ch', 'id', 'project_id'));
    }
    public function addwithcaseid(Request $request, $id)
    {
        return view('csch.addwithcaseid', compact('id'));

    }

    public function storewithcaseid(Request $request)
    {
        $ch = new CaseStudiesChart();

        $ch->chart_title = $request->chart_title;
        $ch->chart_description = $request->chart_description;
        if (isset($request->chart_image_url)) {
            $file = $request->file("chart_image_url")->getClientOriginalName();
            $image_name = "aldr" . Str::random(25) . $file;
            $image = "charts/";
            $image_path = $image . $image_name;
            $ch->chart_image_url = $image_path;
            $request->chart_image_url->move(public_path('storage/charts'), $image_name);
        }
        $ch->case_study_id = $request->case_study_id;
        $id = $request->case_study_id;
        $ch->save();
        return redirect()->to('casech/all/' . $id);

    }
    public function deletewithid(Request $request, $id)
    {
        $t = CaseStudiesChart::find($id);

        $t->delete();
        return back()->with('success', 'This chart has deleted successfully');
    }
    public function editcasechwithcaseid($id)
    {
        $ch = CaseStudiesChart::where('id', '=', $id)->first();

        return view('csch.editwithcaseid', compact('ch', 'id'));
    }
    public function updatecasechwithcaseid($id, Request $request)
    {
        $ch = CaseStudiesChart::find($id);

        $ch->chart_title = $request->chart_title;
        $ch->chart_description = $request->chart_description;
        if (isset($request->chart_image_url)) {
            $file = $request->file("chart_image_url")->getClientOriginalName();
            $image_name = "aldr" . Str::random(25) . $file;
            $image = "charts/";
            $image_path = $image . $image_name;
            $ch->chart_image_url = $image_path;
            $request->chart_image_url->move(public_path('storage/charts'), $image_name);
        }
        $ch->save();
        $id = $ch->case_study_id;
        return redirect()->to('casech/all/' . $id);
    }
}