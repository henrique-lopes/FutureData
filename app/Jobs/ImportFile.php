<?php

namespace App\Jobs;


use App\Models\importUser;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ImportFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;

    public function __construct($filePath)
    {
       // dd($filePath);
        $this->filePath = $filePath;
    }

    public function handle()
    {
        Log::info('ImportFile job started.');
        Excel::import(new importUser, $this->filePath, null, \Maatwebsite\Excel\Excel::CSV);
    }
}
