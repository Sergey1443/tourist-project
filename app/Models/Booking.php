<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['user_id', 'tour_id', 'places', 'total_price'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
