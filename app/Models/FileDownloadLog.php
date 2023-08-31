<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileDownloadLog extends Model
{
    use HasFactory;
    protected $fillable = ['file_id','time','ip_address','user_agent','country',
    ];
}
