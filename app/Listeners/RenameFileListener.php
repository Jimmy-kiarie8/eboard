<?php
namespace App\Listeners;

use App\NewFilePath;
use Unisharp\Laravelfilemanager\Events\FileIsRenaming;

class RenameFileListener
{
    /**
     * Handle the FileIsRenaming event.
     * If the file that is to be renamed exists inside the file_paths table,
     * rename the file path in the database to reflect the new file name.
     *
     * @param  FileIsRenaming  $event
     * @return void
     */
    public function handle(FileIsRenaming $event)
    {
        // Get the old and new file path from the event object
        $oldFilePath = str_replace(public_path(), "", $event->oldPath());
        $newFilePath = str_replace(public_path(), "", $event->newPath());

        // Search for database records containing the old path
        // And update the record with the new file path
        FilePath::where('path', $oldFilePath)->update(['path' => $newFilePath]);
    }
}
