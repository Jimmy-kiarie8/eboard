<?php
namespace App\Listeners;

use Unisharp\Laravelfilemanager\Events\FileWasUploaded;
use App\NewFilePath;
use Auth;

class HasUploadedFileListener
{
    /**
     * Handle the event.
     *
     * @param  FileWasUploaded  $event
     * @return void
     */
    public function handle(FileWasUploaded $event)
    {
        // Get te public path to the file and save it to the database
        $publicFilePath = str_replace(public_path(), "", $event->path());
        FilePath::create([
            'path' => $publicFilePath,
            'user_id' => Auth::id()
        ]);
    }
}
