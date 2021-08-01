<?php

namespace App\Http\Controllers\Backend\Admin\Books;

use App\Http\Controllers\Controller;
use App\Jobs\Dashboard\Chapter\Page\pageupload;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Page;
use App\Models\Volume;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
class PageController extends Controller
{
    private $interger = 000;

    public function dash_chapter_page(Book $book, Volume $volume, Chapter $chapter)
    {

        if ($book->is_novel == 1) {
            return view('backend.dashboard.books.book.novel.pages_index')->with([
                'book' => $book,
                'volume' => $volume,
                'chapter' => $chapter
            ]);
        }
        else {
        return view('backend.dashboard.books.book.comic.pages_index')->with([
                'book' => $book,
                'volume' => $volume,
                'chapter' => $chapter
            ]);
            }

    }

    public function upload_pages(Book $book, Volume $volume, Chapter $chapter, Request $request) //comic
    {

        $request->validate([
            'file' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('file')) {
            //    //  Let's do everything here
            $image = $request->file('file');
            $image->isValid();
            $filename = $image->getClientOriginalName();
            $extension2 = $image->getClientOriginalExtension();
            $extension = $image->extension();
            $filename_number = basename($filename, '.' . $extension2);
            $randomString = Str::random(30);
            //storeAs('public/images/', $this->thumbnail->getClientOriginalName());
            $image->storeAs('/public/pages/', $randomString . "." . $extension);
            $url = '/public/pages/' . $randomString . "." . $extension;

            pageupload::dispatch($chapter, $url, $filename_number);

        }

        return redirect()->back();

    }
    public function view_page (Book $book, Volume $volume, Chapter $chapter, Page $page) //comic
    {
        if ($book->is_novel == 1) {
            return  View::make('backend.dashboard.books.book.novel.view_page', [
                'page'=> $page,
                'chapter'=> $chapter,
                'book'=> $book,
                'volume' => $volume,
            ]);

        }
        else{
      return  View::make('backend.dashboard.books.book.comic.view_page', [
           'page'=> $page,
           'chapter'=> $chapter,
           'book'=> $book,
           'volume' => $volume,
           'url'=> $page->getFirstMediaUrl('pages')
      ]);}
    }
}
