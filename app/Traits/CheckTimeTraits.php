<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Http\Request;

trait CheckTimeTraits {

    public function check_validate_time($from, $to)
    {
        $firstDate = Carbon::parse($from);

        $secondDate = Carbon::parse($to);
         

        // $now_date = Carbon::now();
        // if ($now_date->gte($firstDate)) {
        //     return 0;
        // }
        if ($firstDate->gt($secondDate)) {
            return 0;
        }
        
        return 1;
    }

}
