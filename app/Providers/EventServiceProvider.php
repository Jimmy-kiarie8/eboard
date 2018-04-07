<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use Unisharp\Laravelfilemanager\Events\ImageIsDeleting;
use Unisharp\Laravelfilemanager\Events\ImageIsRenaming;
use Unisharp\Laravelfilemanager\Events\ImageIsUploading;
use Unisharp\Laravelfilemanager\Events\ImageWasUploaded;
use App\Listeners\DeleteImageListener;
use App\Listeners\RenameImageListener;
use App\Listeners\IsUploadingImageListener;
use App\Listeners\HasUploadedImageListener;


use Unisharp\Laravelfilemanager\Events\FileIsDeleting;
use Unisharp\Laravelfilemanager\Events\FileIsRenaming;
use Unisharp\Laravelfilemanager\Events\FileIsUploading;
use Unisharp\Laravelfilemanager\Events\FileWasUploaded;
use App\Listeners\DeleteFileListener;
use App\Listeners\RenameFileListener;
use App\Listeners\IsUploadingFileListener;
use App\Listeners\HasUploadedFileListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ChatEvent' => [
            'App\Listeners\ChatListener',
        ],
        ImageIsDeleting::class => [
            DeleteImageListener::class
        ],
        ImageIsRenaming::class => [
            RenameImageListener::class
        ],
        ImageIsUploading::class => [
            IsUploadingImageListener::class
        ],
        ImageWasUploaded::class => [
            HasUploadedImageListener::class
        ],

        // Files
        FileIsDeleting::class => [
            DeleteFileListener::class
        ],
        FileIsRenaming::class => [
            RenameFileListener::class
        ],
        FileIsUploading::class => [
            IsUploadingFileListener::class
        ],
        FileWasUploaded::class => [
            HasUploadedFileListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
