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

        // $file = $event->file;
        // $file->increment('download_count');
        // // $ip_address = request()->ip();
        // // $user_agent = request()->userAgent();
        // // $country = geoip()->getLocation(request()->ip())->country;
        // // FileDownloadLog::create([
        // //     'file_id' => $file->id,
        // //     'ip_address' => $ip_address,
        // //     'user_agent' => $user_agent,
        // //     'country' => $country,
        // // ]);
        // // Log::info('File downloaded: ' . $file->name);


        // // $userAgent = Request::header('User-Agent');
        // // $ipAddress = Request::ip();
        // // $country = GeoIP::getLocation($ipAddress)->country;

        // // DownloadLog::create([
        // //     'file_id' => $event->file->id,
        // //     'downloaded_at' => now(),
        // //     'ip_address' => $ipAddress,
        // //     'user_agent' => $userAgent,
        // //     'country' => $country,
        // // ]);
        // \Log::info('File downloaded:', [
        //     'file_id' => $file->id,
        //     'file_name' => $file->name,
        //     'download_time' => now(),
        //     'ip_address' => request()->ip(),
        //     'user_agent' => request()->userAgent(),
        //     'country' => geoip()->countryCode(),
        // ]);

        //$request= request();
        $file = $event->file;
        $file->increment('downloads_count'); // Increment download count
        
        $ip_address = Request::ip();
        $user_agent = Request::userAgent();
        $country = GeoIP::getLocation($ip_address)->country;

        // Create and save a download log
        FileDownloadLog::create([
            'file_id' => $file->id,
            'ip_address' => $ip_address,
            'user_agent' => json_encode($user_agent),
            'country' => $country,
            'time' =>now(),
        ]);

        // Log::info('File downloaded:', [
        //     'file_id' => $file->id,
        //     'file_name' => $file->name,
        //     'download_time' => now(),
        //     'ip_address' => $ip_address,
        //     'user_agent' => $user_agent,
        //     'country' => $country,
        // ]);
        $file->downloads++;
        $file->save();
    }

}
