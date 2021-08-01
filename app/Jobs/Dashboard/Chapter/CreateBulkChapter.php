<?php

namespace App\Jobs\Dashboard\Chapter;

use App\Models\Chapter;
use App\Models\Volume;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CreateBulkChapter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $volume, $chapters_number_starts, $chapters_number_ends, $chapters_locked;

    public function __construct(Volume $volume , $chapters_number_starts, $chapters_number_ends, $chapters_locked)
    {
        $this->volume = $volume;
        $this->chapters_number_starts = $chapters_number_starts;
        $this->chapters_number_ends = $chapters_number_ends;
        $this->chapters_locked = $chapters_locked;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        while ($this->chapters_number_starts <= $this->chapters_number_ends) {
            Chapter::create([
                'name' => 'Chapter '.$this->chapters_number_starts,
                'number' => $this->chapters_number_starts,
                'locked' => $this->chapters_locked ?? false,
                'volume_id' => $this->volume->id,
            ]);

            $this->chapters_number_starts++;
        }

    }
}
