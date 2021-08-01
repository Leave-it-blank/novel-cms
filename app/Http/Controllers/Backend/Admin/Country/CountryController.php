<?php

namespace App\Http\Controllers\Backend\Admin\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     *
     */
    public function dash_country()
    {
        return view('backend/dashboard/management/countries/countries_index');
    }
}
