<?php

namespace App\Http\Livewire\Backend\Management\User;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class Userdata extends LivewireDatatable
{
    use AuthorizesRequests;
    use WithPagination;
    public $hideable = 'select';
    public $exportable = true;

    public function builder()
    {
        return User::query();
    }
    public function delete_user(User $user){

        $this->authorize('delete', $user);
        $user->delete();
        $this->emit('Danger_alert',  $user->name . ' has been deleted!');
        $this->emit('refreshLivewireDatatable');
     //   (new \App\Models\User)->Country_delete($user);
    }
    public function columns(): array
    {
        return [
            Column::checkbox(),
            NumberColumn::name('id')
                ->label('ID')
                ->hide(),
            Column::name('name')
                ->label('Name')
                ->defaultSort('asc')
                ->searchable()
                ->filterable(),
            Column::name('email')
                ->label('Email')
                ->defaultSort('asc')
                ->searchable()
                ->filterable(),

            DateColumn::name('created_at')
                ->label('Created On')
                ->filterable()
                ->hide(),

            DateColumn::name('updated_at')
                ->label('Updated On')
                ->filterable(),


            Column::callback(['id', 'name'], function ($id, $name) {
                return view('livewire.backend.management.user.table-actions', ['id' => $id, 'name' => $name]);
            })
        ];
    }
}
