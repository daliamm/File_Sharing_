<?php

namespace App\Listeners;

use App\Events\FileDownloaded;
use App\Models\File;
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
    public function handle(object  $event) 
    {

        // $file = $event->file;
       // $file->increment('downloads_count'); // Increment download count
        // $file->save();
       FileDownloaded::create([
            'file_id' => $event->fileId,
            'ip_address' => $event->ipAddress,
            'user_agent' => $event->userAgent,
           
        ]);
        $file = File::find($event->fileId);
        $file->increment('downloads_count');
    }

}
