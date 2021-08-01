<?php

namespace App\Http\Livewire\Backend\Admin\Books\Volume;

use App\Models\Book;
use App\Models\Volume;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class Table extends LivewireDatatable
{   use AuthorizesRequests;
    use WithPagination;
    public $hideable = 'select';
    public $exportable = true;
    public $book;
    public $params;

    public function builder()
    {
       return Volume::Admin_Get_Volume($this->params);
    }
    public function delete_volume(Volume $volume)
    {
        $this->authorize('delete', $volume, Volume::class);
        $volume->delete();
        $this->emit('Danger_alert',  $volume->number . ' has been deleted!');
        $this->emit('refreshLivewireDatatable');
       // return redirect()->route('admin.books');
    }
    public function columns()
    {
        return [
            Column::checkbox(),
            NumberColumn::name('id')
                ->label('ID')
                ->hide(),

            NumberColumn::name('number')
                ->label('Volume Number')
                ->searchable()
                ->filterable(),
            Column::name('name')
                ->label('Name')
                ->defaultSort('asc')
                ->searchable()
                ->filterable(),
            BooleanColumn::name('locked')
                ->label('Locked?')
                ->filterable()
                ->hide(),
            NumberColumn::name('book_id')
                ->label('Book')
                //->editable()
                ->hide(),

            DateColumn::name('updated_at')
                ->label('Last Updated')
                ->filterable()
                ->hide(),

            Column::callback(['id', 'number', 'book_id'], function ($id, $number, $book_id) {
                return view('livewire.backend.admin.books.volume.table-actions', ['id' => $id, 'number' => $number , 'book_id'=> $book_id]);
            })
        ];
    }

}
