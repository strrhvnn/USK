<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // public function getDashboardRoute()
    // {
    //     $user = auth()->user();

    //     if ($user) {
    //         switch ($user->role) {
    //             case 'admin':
    //                 return route('admin.dashboard');
    //             case 'maskapai':
    //                 return route('maskapai.dashboard');
    //                 // Add more cases for other roles if needed
    //             default:
    //                 return route('user.dashboard');
    //         }
    //     }

    //     // Default to the user dashboard if no role is found
    //     return route('user.dashboard');
    // }

    public function airline()
    {
        return $this->hasOne(Airline::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
    // In User model
    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}
