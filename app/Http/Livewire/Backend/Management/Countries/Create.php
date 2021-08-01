<?php

namespace App\Http\Livewire\Backend\Management\Countries;

use App\Models\Country;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Create extends Component
{
    use AuthorizesRequests;
    public $name , $code;
    protected $rules = [
        'name' => 'required|min:3|string',
        'code' => 'nullable|integer'
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function Create_Country()
    {
        $this->authorize('create_role', User::class);
        $country = Country::create([
            'name' => $this->name,
            'code' => $this->code
        ]);
        $this->emit('Success_alert',   'Country Tag Created!');
        $this->dispatchBrowserEvent('created-country');
        $this->emit('refreshcountries');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.backend.management.countries.create');
    }
}
