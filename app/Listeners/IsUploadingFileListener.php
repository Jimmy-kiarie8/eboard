<?php

namespace App\Listeners;

use Unisharp\Laravelfilemanager\Events\FileIsUploading;
use Illuminate\Support\Facades\Auth;

class IsUploadingFileListener
{
    /**
     * Handle the event.
     *
     * @param  FileIsUploading  $event
     * @return void
     */
    public function handle(FileIsUploading $event)
    {
        if (!Auth::guard('web')->check()) {
            die('<p>You need to be logged in in order to upload files.</p>');
        }
    }
}
