<?php

namespace App\Services;

use App\Jobs\SaveRequestLogJob;
use App\Models\RequestLog;
use Illuminate\Http\Request;

class RequestLoggerService
{
    public static function logRequest(Request $request): void
    {
        $requestLog = new RequestLog();
        $requestLog->content = substr($request->getContent(), 0, 255); // Limit to 255 characters
        $requestLog->method = $request->method();
        $requestLog->url = substr($request->url(), 0, 255); // Limit to 255 characters$this->request->url();

        SaveRequestLogJob::dispatch($requestLog);
    }
}
