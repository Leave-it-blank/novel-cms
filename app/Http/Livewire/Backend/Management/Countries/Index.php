<?php

namespace App\Http\Livewire\Backend\Management\Countries;

use App\Models\Country;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    public $countries;
    protected $listeners = ['refreshcountries' => 'get_country'];
    public function get_country()
    {
        return Country::query()->paginate(5);
    }
    public function delete_country(Country  $country)
    {
        $this->authorize('delete_country',  User::class);
        $country->delete();
        $this->emit('Success_alert',  'Country has been Deleted!');
    }
    public function render()
    {
      //  dd($this->get_country());

        return view('livewire.backend.management.countries.index');
    }
}
