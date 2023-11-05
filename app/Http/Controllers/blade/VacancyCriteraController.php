<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use App\Models\VacanciesCriteria;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyCriteraController extends Controller
{
    public function allcriteraforvacancyid(Request $request, $id)
    {
        $criteras = VacanciesCriteria::where('vacancy_id', '=', $id)->get();
        $vac = Vacancy::where('id', $id)->first();
        return view('vacancies_criteras.allwithvacancyid', compact('criteras', 'id','vac'));
    }
    public function addwithvacancyid(Request $request, $id)
    {
        return view('vacancies_criteras.addwithvacancyid', compact('id'));

    }

    public function storewithvacancyid(Request $request)
    {
        $critera = new VacanciesCriteria();
        $critera->item = $request->item;
        $critera->vacancy_id = $request->vacancy_id;
        $id = $request->vacancy_id;
        $critera->save();
        return redirect()->to('/vacancy/critera/all/' . $id);

    }
    public function deletewithid(Request $request, $id)
    {
        $t = VacanciesCriteria::find($id);

        $t->delete();
        return back()->with('success', 'This image has deleted successfully');
    }
    public function editcriterawithvacancyid($id)
    {
        $im = VacanciesCriteria::where('id', '=', $id)->first();

        return view('vacancies_criteras.editwithvacancyid', compact('im'));
    }
    public function updatecriterawithvacancyid($id, Request $request)
    {
        $critera = VacanciesCriteria::find($id);

        $critera->item = $request->item;

        $critera->save();
        $id = $critera->vacancy_id;
        return redirect()->to('vacancy/critera/all/' . $id);
    }

}