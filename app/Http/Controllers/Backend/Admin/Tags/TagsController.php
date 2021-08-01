<?php

namespace App\Http\Controllers\Backend\Admin\Tags;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function dash_tags()
    {
       return view('backend/dashboard/management/Tags/tags_index');
    }
}
