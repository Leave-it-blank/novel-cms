<?php

namespace App\Http\Livewire\Backend\Management\Tags;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Create extends Component
{  use AuthorizesRequests;
    public $name , $tag_type;
    protected $rules = [
        'name' => 'required|min:3|string',
        'tag_type' => 'nullable|string'
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function Create_Tag()
    {
        $this->authorize('create_role', User::class);
        $country = Tag::create([
            'name' => $this->name,
            'tag_type' => $this->tag_type
        ]);
        $this->emit('Success_alert',   'Country Tag Created!');
        $this->dispatchBrowserEvent('created-tag');
        $this->emit('refreshtags');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.backend.management.tags.create');
    }
}
