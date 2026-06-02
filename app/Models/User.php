<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['login', 'name', 'middlename', 'lastname', 'email', 'phone', 'password', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    // Метод для проверки администратора
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    
    // Связь с бронированиями
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    
    // Полное ФИО
    public function getFullNameAttribute()
    {
        return trim($this->lastname . ' ' . $this->name . ' ' . $this->middlename);
    }
}
