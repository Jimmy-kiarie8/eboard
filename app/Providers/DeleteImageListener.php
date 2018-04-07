<?php

namespace App\Providers;

use App\Providers\ImageIsDeleting;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteImageListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ImageIsDeleting  $event
     * @return void
     */
    public function handle(ImageIsDeleting $event)
    {
        //
    }
}
