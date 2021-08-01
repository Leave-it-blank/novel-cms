<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function dash_home()
    {
        $comics =    Book::getcomics();
        $novels =    Book::getnovels();
        return view('Frontend.Home.Home')->with([
            'comics' => $comics,
            'novels' => $novels
        ]);

    }
}
