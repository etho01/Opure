<?php

namespace App\Jobs;

use App\Http\Controllers\DataController;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class getDataFromWebsiteServ implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        DataController::getDataFromWebsiteServ();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
