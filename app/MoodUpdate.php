<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoodUpdate extends Model
{
    protected $guarded = [
        'goals'
    ];

    public function scopeToday($query)
    {
        return $query->where('created_at', '>=', date('Y-m-d').' 00:00:00');
    }

    public function getMoodDescriptionAttribute()
    {
        switch ($this->mood) {
            case 1: return "&#128545; Terrible";
            case 2: return "&#128533; Bad";
            case 3: return "&#128528; OK";
            case 4: return "&#128512; Good";
            case 5: return "&#128513; Great";
            default: return "&#128513; Great";
        }
    }

    public function goals()
    {
        return $this->belongsToMany(Goal::class, 'mood_update_goal');
    }
}
