<?php

namespace App\Listeners;

use App\Models\TaskAudit;
use App\Jobs\SendTaskCompletedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WriteTaskAuditLog
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
    public function handle(object $event): void
    {
        TaskAudit::create([
            'task_id' => $event->task->id,
            'event' => class_basename($event),
            'occurred_at' => now(),
            'meta' => $event->meta,
        ]);

        SendTaskCompletedNotification::dispatch(
            $event->task,
            $event->meta['user_id'] ?? $event->task->user_id
        );
    }
}
