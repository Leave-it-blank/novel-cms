<?php

namespace App\Http\Livewire\Backend\Admin\Books\Volume;

use App\Models\Volume;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Edit extends Component
{
    use AuthorizesRequests;

    public $volume, $name, $number, $locked;
    protected $rules = [
        'number' => 'required|integer',
        'name' => 'required|min:2',
        'locked' => 'bool|nullable',
    ];

    public function mount(Volume $volume)
    {

        $this->volume = $volume;
        $this->name = $volume->name;
        $this->number = $volume->number;
        $this->locked = $volume->locked;
        // i dont want original state ig bug to fix in future.  $this->locked = $volume->locked;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }

    public function UpdateVolume()
    {

        //need to authorize this here
        $this->authorize('update', $this->volume, Volume::class);

        $validatedData = $this->validate();
        $this->volume->update([
            'name' => $this->name,
            'number' => $this->number,
            'locked' => $this->locked ?? false,
        ]);
        $this->emit('Success_alert',   'Volume ' . $this->volume->number . ' has been updated!');
       return  redirect()->route('admin.book.show', ['book' => $this->volume->book_id]);


    }


    public function render()
    {
        return view('livewire.backend.admin.books.volume.edit')
            ->layout('components.layouts.admin_layout');
    }
}
