<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UploadSingleFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $fileName;
    private $model;
    private $collectionName;
    public function __construct(string $fileName, $model, string $collectionName)
    {
        $this->fileName = $fileName;
        $this->model = $model;
        $this->collectionName = $collectionName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (request()->hasFile($this->fileName)) {
            $this->model->clearMediaCollection($this->collectionName);
            $this->model->addMediaFromRequest($this->fileName)->toMediaCollection($this->collectionName);
        }
    }
}
