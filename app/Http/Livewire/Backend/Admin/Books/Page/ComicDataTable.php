<?php

namespace App\Http\Livewire\Backend\Admin\Books\Page;

use App\Models\Book;
use App\Models\Chapter;
use App\Models\Page;
use App\Models\Volume;
use Livewire\Component;
use Livewire\WithPagination;

class ComicDataTable extends Component
{
    use WithPagination;
    public $book, $volume, $chapter;
    public $pages;

   public function get_pages(Chapter $chapter)
    {
       return Page::where('chapter_id', $chapter->id)->paginate(5);
    }
    public function mount(Book $book, Volume $volume, Chapter $chapter)
    {
         $this->book = $book;
         $this->volume = $volume;
         $this->chapter = $chapter;
     //   $this->pages = $this->get_pages($chapter);
    }

    public function delete_Page(Page $page){
         $this->authorize('delete', $page, Page::class);
         $page->delete();
        return  $this->emit('Danger_alert',   'Page Deleted!');

    }

    public function render()
    {
        return view('livewire.backend.admin.books.page.comic-data-table');
    }
}
