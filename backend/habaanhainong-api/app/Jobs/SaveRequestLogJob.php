<?php

namespace App\Jobs;

use App\Models\RequestLog;
use App\Services\RequestLoggerService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveRequestLogJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected RequestLog $requestLog;

    /**
     * Create a new job instance.
     */
    public function __construct(RequestLog $requestLog)
    {
        $this->requestLog = $requestLog;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $this->requestLog->save();
    }

//    public function __sleep()
//    {
//        return ['request'];
//    }
}
