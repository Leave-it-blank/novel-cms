<?php

namespace App\Jobs\Dashboard\Chapter\Page;

use App\Models\Chapter;
use App\Models\Page;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class pageupload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $chapter, $url, $filename, $number = 1;

    public function __construct(Chapter $chapter, $url, $filename)
    {
        $this->chapter = $chapter;
        $this->url = $url;
        $this->filename = $filename;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $page = Page::create([
            'name' => $this->filename,
            'image' => $this->url,
            'chapter_id' => $this->chapter->id,
        ]);
        $page->addMediaFromDisk($this->url)
            ->toMediaCollection('pages');



    }
}
