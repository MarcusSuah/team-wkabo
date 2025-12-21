<?php
// app/Models/User.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = ['fname', 'mid_name', 'lname', 'email', 'password', 'phone', 'username', 'status', 'avatar', 'role'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function isManager()
    {
        return $this->hasRole('manager');
    }

    public function isUser()
    {
        return $this->hasRole('user');
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            if (!$user->hasAnyRole(['admin', 'manager'])) {
                $user->assignRole('user');
            }
        });
    }
}
