<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'tweet_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function tweet() {
        return $this->belongsTo(Tweet::class);
    }

    public function getCreatedAtAttribute($date)
    {   
        if(Carbon::parse($date)->format('Y-m-d') == Date("Y-m-d", time())) return Carbon::parse($date)->format('H:i');
        return Carbon::parse($date)->format('d M. Y');
    }
}
