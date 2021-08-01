<?php

namespace App\Http\Controllers\Backend\Admin\Ads;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    //

    public function dash_ads(){
        return view('backend.dashboard.Advertisement.Ads_index');
    }
}
