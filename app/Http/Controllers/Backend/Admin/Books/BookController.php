<?php

namespace App\Http\Controllers\Backend\Admin\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
   public function dash_books(){
       return view('backend.dashboard.books.books_index');
   }

}
