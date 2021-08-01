<?php

namespace App\Http\Livewire\Backend\Admin\Books\Page\Novel;

use App\Models\Book;
use App\Models\Chapter;
use App\Models\Page;
use App\Models\Volume;
use http\Env\Request;
use Livewire\Component;

class Edit extends Component
{
    public $book, $volume, $chapter, $page;
    public $text, $notice , $image;
    protected $rules = [
        'text' => 'required|string',
        'notice' => 'required|string',
    ];

    public function mount(Book $book, Volume $volume, Chapter $chapter , Page $page)
    {
        $this->book = $book;
        $this->volume = $volume;
        $this->chapter = $chapter;
        $this->page = $page;
        $this->text = $page->text;
        //   $this->pages = $this->get_pages($chapter);
    }

    public function edit_novel_page( ){

        Page::where('chapter_id', $this->chapter->id)->update([
            'text' => $this->text,
            'notice' => $this->notice,
        ]);
        $this->emit('reinit');
        $this->emit('Success_alert',   'Novel Updated~!');
    }
    public function render()
    {
        return view('livewire.backend.admin.books.page.novel.edit');
    }
}
