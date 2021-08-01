<?php

namespace App\Http\Livewire\Backend\Admin\Books\Book;

use App\Models\Book;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Illuminate\Support\Facades\DB;
class Table extends LivewireDatatable
{
    use AuthorizesRequests;
    use WithPagination;
    public $hideable = 'select';
    public $exportable = true;

    public function builder()
    {
        return Book::query();
    }
    public function delete_book(Book $book){

        $this->authorize('delete', $book);
        $book->delete();
        $this->emit('Danger_alert',  $book->title . ' has been deleted!');
        $this->emit('refreshLivewireDatatable');
        (new \App\Models\Book)->Country_delete($book);
    }
    public function columns(): array
    {
        return [
            Column::checkbox(),
            NumberColumn::name('id')
                ->label('ID')
                ->hide(),
            Column::name('title')
                ->label('Title')
                ->defaultSort('asc')
                ->searchable()
                ->filterable(),

            BooleanColumn::name('hidden')
                ->label('Hidden')
                ->filterable(),
            BooleanColumn::name('is_novel')
                ->label('Novel?')
                ->filterable()
                ->hide(),
            BooleanColumn::name('mature')
                ->label('18+?')
                ->filterable(),
            BooleanColumn::name('locked')
                ->label('Locked?')
                ->filterable()
                ->hide(),

            DateColumn::name('updated_at')
                ->label('Last Updated')
                ->filterable()
                ->hide(),

            Column::callback(['id', 'title'], function ($id, $title) {
                  return view('livewire.backend.admin.books.book.table-actions', ['id' => $id, 'name' => $title]);
              })
        ];
    }

}
