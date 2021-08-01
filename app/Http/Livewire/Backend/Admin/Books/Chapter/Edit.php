<?php

namespace App\Http\Livewire\Backend\Admin\Books\Chapter;

use App\Models\Book;
use App\Models\Chapter;
use App\Models\Volume;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Edit extends Component
{

    use AuthorizesRequests;
    public $chapter , $name , $number , $locked , $book, $volume;
    protected $rules = [
        'number' => 'required|integer',
        'name' => 'required|min:1',
        'locked' => 'bool|nullable',
    ];
    public function mount(Book $book, Volume $volume, Chapter $chapter){

        $this->book = $book;
        $this->volume = $volume;
        $this->chapter = $chapter;
        $this->name = $chapter->name;
        $this->number = $chapter->number;
        $this->locked = $chapter->locked;
        // i dont want original state ig bug to fix in future.  $this->locked = $volume->locked;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }
    public function UpdateChapter(){

        //need to authorize this here
        $this->authorize('update',  $this->chapter, Chapter::class);

        $validatedData = $this->validate();
        $this->chapter->update([
            'name' => $this->name,
            'number' => $this->number,
            'locked' => $this->locked ?? false,
        ]);

        $this->emit('Success_alert',  'Chapter '.  $this->chapter->number. ' has been updated!');
        return redirect()->route('admin.volume.show', ['book'=> $this->book, 'volume'=> $this->volume]);

    }


    public function render()
    {
        return view('livewire.backend.admin.books.chapter.edit')
        ->layout('components.layouts.admin_layout');
    }
}
