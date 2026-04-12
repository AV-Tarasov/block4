<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\TaskCompleted;
use App\Listeners\WriteTaskAuditLog;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        TaskCompleted::class => [
            WriteTaskAuditLog::class,
        ],
    ];

    public function boot(): void
    {
        //
    }
}
