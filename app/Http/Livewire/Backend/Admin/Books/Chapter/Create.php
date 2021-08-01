<?php

namespace App\Http\Livewire\Backend\Admin\Books\Chapter;

use App\Jobs\Dashboard\Chapter\CreateBulkChapter;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Volume;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use AuthorizesRequests;
    use WithFileUploads;
    public $name, $number, $locked;
    public $book, $volume, $country;
    public $chapters_number_starts, $chapters_number_ends, $chapters_locked;
    private $chapter_bulk_job = 0;

    public function mount(Book $book, Volume $volume)
    {
        $this->book = $book;
        $this->volume = $volume;
    }
    protected $rules = [
        'number' => 'required|integer',
        'name' => 'required|min:1',
        'locked' => 'bool|nullable',
        'chapters_number_starts' => 'required|integer',
        'chapters_number_ends' => 'required|integer',
        'chapters_locked' => 'bool|nullable',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }

    public function CreateChapter()
    {

        $this->authorize('create', Chapter::class);
        $validatedData = $this->validate([
            'number' => 'required|integer',
            'name' => 'required|min:2',
            'locked' => 'bool|nullable',
        ]);
        Chapter::create([
            'name' => $this->name,
            'number' => $this->number,
            'locked' => $this->locked ?? false,
            'volume_id' => $this->volume->id
        ]);
        $this->emit('update_chapters');
        $this->number = $this->number +1;
        $this->emit('refreshLivewireDatatable');
        $this->emit('Success_alert',  'Chapter ' . $this->number . ' has been created!');
        $this->dispatchBrowserEvent('created-chapter');
        //   return redirect()->route('admin.library');
    }

    public function CreateBulkChapters()
    {
        $this->authorize('create', Chapter::class);
        $validatedData = $this->validate([
            'chapters_number_starts' => 'required|integer',
            'chapters_number_ends' => 'required|integer',
            'chapters_locked' => 'bool|nullable',
        ]);
      if ($this->chapter_bulk_job == 0) {
          CreateBulkChapter::Dispatch($this->volume, $this->chapters_number_starts, $this->chapters_number_ends, $this->chapters_locked);
          $this->chapter_bulk_job = 1;
          $this->emit('refreshLivewireDatatable');
          $this->emit('Success_alert',  'Chapter ' . $this->number . ' has been created!');
          $this->dispatchBrowserEvent('created-bulk-chapter');
          return 0;
      } else {
          return abort(403);
      }

    }
    public function render()
    {
        return view('livewire.backend.admin.books.chapter.create');
    }
}
