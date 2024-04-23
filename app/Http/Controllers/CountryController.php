<?php

namespace App\Http\Controllers;

use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $countries->load(['cities' => fn ($query) => $query
//            ->orderBy('population')
            ->where('population','>', 60000)]);

//        $countries = Country::with('cities')->get();
        dd($countries);
    }
}
