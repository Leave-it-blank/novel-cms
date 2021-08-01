<?php

namespace App\Http\Livewire\Backend\Admin\Books\Book;

use App\Models\Book;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;
    public $title, $hidden, $country, $mature, $locked, $is_novel, $description, $thumbnail = null, $url, $book;
    public $country_details;
    protected $rules = [
        'title' => 'required|min:2',
        'description' => 'required|min:20',
        'hidden' => 'bool|nullable',
        'is_novel' => 'bool',
        'locked' => 'bool|nullable',
        'thumbnail' => 'image|max:10240|nullable',
        'mature' => 'bool|nullable'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(Book $book)
    {
        $this->book = $book;
        $this->title = $book->title;
        $this->is_novel = $book->is_novel;
        $this->mature = $book->mature;
        $this->locked = $book->locked;
        $this->hidden = $book->hidden;
        $this->country_details = $this->book->country_Details($book);

        $this->country = $this->country_details->country;
        $this->description = $book->Description;           //TODO Change D to d in db

    }

    public function UpdateBook()
    {


        //need to authorize this here
        $this->authorize('update', $this->book, book::class);

        $validatedData = $this->validate();
        $this->book->update([
            'title' => $this->title,
            'description' => $this->description,
            'hidden' => $this->hidden ?? false,
            'locked' => $this->locked ?? false,
            'is_novel' => $this->is_novel ?? false,
            'mature' => $this->mature ?? false,
        ]);
        $this->country_details->update([
            'country_id' => $this->country
        ]);

        if ($this->thumbnail != null) {

            $this->book->getFirstMedia()->delete();
            $extension = $this->thumbnail->extension();
            $randomString = Str::random(30);
            $this->thumbnail->storeAs('/public/comics/cover/', $randomString . "." . $extension);
            $this->url = '/public/comics/cover/' . $randomString . "." . $extension;
            $this->book->addMediaFromDisk($this->url)
                ->toMediaCollection();

        }

        $this->emit('Success_alert',   'Book updated!');
        return redirect()->route('admin.book.show', ['book' => $this->book]);

    }

    public function render()
    {
        return view('livewire.backend.admin.books.book.edit')
              ->layout('components.layouts.admin_layout');
    }
}
