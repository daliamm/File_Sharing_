<?php

namespace App\Listeners;

use App\Events\FileDownloaded;
use App\Models\FileDownloadLog;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Torann\GeoIP\Facades\GeoIP;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FileDownloadedListener
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
       // $file->increment('downloads_count'); // Increment download count
        $file->save();
    }

}
