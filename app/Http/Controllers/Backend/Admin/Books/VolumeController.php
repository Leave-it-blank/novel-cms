<?php

namespace App\Http\Controllers\Backend\Admin\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Volume;
use Illuminate\Http\Request;

class VolumeController extends Controller
{

   public function dash_book_volumes(Book $book){

       return view('backend.dashboard.books.book.volume.volume_index') ->with(['book'=> $book]);

   }
}
