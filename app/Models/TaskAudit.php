<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskAudit extends Model
{
    protected $fillable = [
        'task_id',
        'event',
        'occurred_at',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
        'occurred_at' => 'datetime',
    ];
}
