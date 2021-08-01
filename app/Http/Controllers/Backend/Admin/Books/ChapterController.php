<?php

namespace App\Http\Controllers\Backend\Admin\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Volume;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
   public function dash_volume_chapter(Book $book, Volume $volume){

       return view('backend.dashboard.books.book.chapter.chapter_index')
           ->with([
               'book'=>$book,
               'volume'=>$volume
             ]);
   }
}
