<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Volume;
use Illuminate\Http\Request;

class ChapterController extends Controller
{

    public function dash_chapter(Book $book, Volume $volume ,  Chapter $chapter){


        return view('backend.admin.chapter_view_index')->with(['book'=>$book,'volume'=>$volume , 'chapter'=>$chapter]);
    }
}
