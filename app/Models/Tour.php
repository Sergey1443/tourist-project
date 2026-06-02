<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = ['name', 'date', 'price', 'image'];
    
    protected $casts = [
        'date' => 'date',
    ];
    
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}