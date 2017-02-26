<?php

namespace App;

use App\Comment;
use Carbon\Carbon;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }
        
        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }
    // public function addComment($body)
    // {
    //     $this->comments()->create(compact('body'));
    //     // Comment::create([
    //     //     'body' => $body,
    //     //     'post_id' => $this->id
    //     //     ]);
    // }
}
