<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ,SoftDeletes,HasRoles;

    public static $permissions = [
        'user-show',
        'user-store',
        'user-update',
        'user-delete',
    ];
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'photo',
        'phone',
        'front_id_card_photo',
        'back_id_card_photo',
        'branch_id',
        'department_id',
        'salary'
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

    const PATH="users";



    function department(){
        return $this->belongsTo(Department::class);
    }

    function branch(){
        return $this->belongsTo(Branch::class);
    }

    function attendances(){
        return $this->hasMany(Attendance::class);
    }

    function vacations(){
        return $this->hasMany(Vacation::class);
    }

    
}
