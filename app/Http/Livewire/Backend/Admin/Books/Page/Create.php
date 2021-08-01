<?php

namespace App\Http\Livewire\Backend\Admin\Books\Page;

use App\Models\Book;
use App\Models\Chapter;
use App\Models\Page;
use App\Models\Volume;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;


class Create extends Component
{
    use WithPagination;
    use AuthorizesRequests;
    public $book, $volume, $chapter;
    public $pages;

    public function mount(Book $book, Volume $volume, Chapter $chapter)
    {
        $this->book = $book;
        $this->volume = $volume;
        $this->chapter = $chapter;
        //   $this->pages = $this->get_pages($chapter);
    }
    public function  create_novel_page()
    {
        if(Page::query()->where('chapter_id', $this->chapter->id)->count() == null ){
            $this->authorize('create', Page::class);
            Page::query()->create([
                'name' => "01",
                'number' => "01",
                'chapter_id'=> $this->chapter->id,
            ]);
            $this->emit('refreshtable');
            $this->emit('Success_alert', 'Page created!');
          return null;
        }
        $this->emit('Warning_alert', 'Page already created!');

    }
    public function render()
    {
        return view('livewire.backend.admin.books.page.create');
    }
}
