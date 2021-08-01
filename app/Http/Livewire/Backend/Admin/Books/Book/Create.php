<?php

namespace App\Http\Livewire\Backend\Admin\Books\Book;

use App\Models\Book;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $title, $hidden, $country, $mature, $locked, $is_novel, $description, $thumbnail, $url ,  $book, $country_id;
    protected $rules = [
        'title' => 'required|min:2',
        'description' => 'required|min:20',
        'hidden' => 'bool|nullable',
        'is_novel' => 'bool',
        'locked' => 'bool|nullable',
        'thumbnail' => 'image|max:10240',
      //  'country' => 'integer',
        'mature' => 'bool|nullable'
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function CreateBook()
    {
        //   return dd($this);
        $this->authorize('create', Book::class);

            $temp_id = rand(1000, 20000);
            $validatedData = $this->validate();
            $this->book = Book::create([
                'title' => $this->title,
                'description' => $this->description,
                'hidden' => $this->hidden ?? false,
                'locked' => $this->locked ?? false,
                'is_novel' => $this->is_novel ?? false,
                'mature' => $this->mature ?? false,
            ]);
            $this->book->id = $temp_id;
            $this->book->save();
            $this->book->country()->create(['country_id' => $this->country_id,
                'book_id' => $this->book->id]);


            $extension = $this->thumbnail->extension();
            $randomString = Str::random(30);
            //storeAs('public/images/', $this->thumbnail->getClientOriginalName());
            $this->thumbnail->storeAs('/public/comics/cover/', $randomString . "." . $extension);
            $this->url = '/public/comics/cover/' . $randomString . "." . $extension;


            $this->book->addMediaFromDisk($this->url)
                ->toMediaCollection('thumbnail');

            //session()->flash('success', $this->title . ' has been created!');
            //return redirect()->route('admin.library');
            $this->emit('refreshLivewireDatatable');
            $this->emit('Success_alert',   'Book Created!');
           $this->dispatchBrowserEvent('created-book');
           $this->reset();



    }
    public function render()
    {
        return view('livewire.backend.admin.books.book.create');
    }
}
