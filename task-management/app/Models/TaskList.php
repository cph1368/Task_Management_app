<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaskList extends Model
{
    protected $table = 'lists';

    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

    // A List has many Tasks
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);  // ← THIS WAS WRONG
    }

    // A List belongs to one User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class); // ← lowercase b
    }
}
