<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\View\View;

class CityController extends Controller
{
    public function index(): View
    {
        $cities = City::query()->where('population', '>', 50000)->orderBy('population')->get();

        return view('cities.index', ['cities' => $cities]);
    }
}
