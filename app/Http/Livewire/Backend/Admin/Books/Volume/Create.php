<?php

namespace App\Http\Livewire\Backend\Admin\Books\Volume;

use App\Models\Book;
use App\Models\Volume;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Create extends Component
{
    use AuthorizesRequests;

    public $book;
    public $name, $number, $locked;

    protected $rules = [
        'number' => 'required|integer',
        'name' => 'required|min:2',
        'locked' => 'bool|nullable',
    ];

    /**
     * @param Book $book
     */
    public function mount(Book $book){
        // $book->load('volumes');
        $this->book = $book;

    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }
    public function CreateVolume(){

        //need to authorize this here
        $this->authorize('create', Volume::class);

        $validatedData = $this->validate();
        Volume::create([
            'name' => $this->name,
            'number' => $this->number,
            'locked' => $this->locked ?? false,
            'book_id' => $this->book->id
        ]);
        $this->emit('refreshLivewireDatatable');
        $this->dispatchBrowserEvent('created-book');
        $this->number = $this->number +1;

        $this->emit('Success_alert',  'Volume '. $this->number. ' has been created!');

    }
    public function render()
    {
        return view('livewire.backend.admin.books.volume.create');
    }
}
