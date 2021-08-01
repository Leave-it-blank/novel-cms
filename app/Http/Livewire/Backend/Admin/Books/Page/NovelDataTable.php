<?php

namespace App\Http\Livewire\Backend\Admin\Books\Page;

use App\Models\Book;
use App\Models\Chapter;
use App\Models\Page;
use App\Models\Volume;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class NovelDataTable extends Component
{   use WithPagination;
    use AuthorizesRequests;
    public $book, $volume, $chapter;
    public $pages;

    public function get_pages(Chapter $chapter)
    {
        return Page::where('chapter_id', $chapter->id)->paginate(5);
    }
    protected $listeners = ['refreshtable' => 'render'];
    public function mount(Book $book, Volume $volume, Chapter $chapter)
    {
        $this->book = $book;
        $this->volume = $volume;
        $this->chapter = $chapter;
        //   $this->pages = $this->get_pages($chapter);
    }
//    public function paginationView()             //we simply use this to use custom paginations
//    {
//        return 'partials.paginate';
//    }

   public function delete_Page(Page $page)
    {
        $this->authorize('delete', $page, Page::class);
        $page->delete();
        $this->emit('Danger_alert', 'Page Deleted!');
        return null;

    }
    public function render()
    {
        return view('livewire.backend.admin.books.page.novel-data-table');
    }
}
