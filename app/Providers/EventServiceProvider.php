<?php

namespace App\Providers;

use App\Events\SubmissionSaved;
use App\Listeners\LogSubmissionSaved;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        SubmissionSaved::class => [
            LogSubmissionSaved::class,
        ],
    ];
}
