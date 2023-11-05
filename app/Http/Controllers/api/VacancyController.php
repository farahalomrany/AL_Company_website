<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VacancyResource;
use App\Models\Vacancy;
use App\Traits\ResponseTraits;

class VacancyController extends Controller
{
    use ResponseTraits;

    public function index()
    {
        $vacancy = Vacancy::all()->where('is_open', '=', 1);

        if (isset($vacancy)) {
            $resource_data = VacancyResource::collection($vacancy);
            $data = [
                "vacancies" => $resource_data
            ];
            return $this->sendResponse($data, 'completed successfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
}