<?php

namespace App\Listeners;
use App\Events\FileDownloaded;
use App\Models\DownloadLog;
use App\Models\FileDownloadLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogFileDownloadListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */

    public function handle(FileDownloaded $event)
    {
        $file = $event->file;
        $request = $event->request;
        $Logdownload = new FileDownloadLog();
        $Logdownload->file_id = $file->id;
        $Logdownload->downloaded_at = now();
        $Logdownload->ip_address = $request->ip();
        $Logdownload->user_agent = $request->userAgent();
        $country = 'country';
        $Logdownload->country = $country;
        $Logdownload->save();
        $file->increment('download_count');

    }
}