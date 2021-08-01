<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibraryController extends Controller
{

public function dash_library(){

    return view('backend.admin.Library.Library_home');
}


}
