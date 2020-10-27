<?php

use Carbon\Carbon;


if (!function_exists('date_formate')) {

    function date_formate($date, $formate)
    {
    	return Carbon::parse($date)->format($formate);
    }

}