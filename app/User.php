<?php

namespace App;

use App\Permissions\HasPermissionsTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sites(){
        return $this->belongsToMany('App\Site', 'site_user');
    }

    public function studies()
    {
        return $this->belongsToMany('App\Study', 'study_user');
    }

    public function login_details()
    {
        return $this->hasMany('App\LoginDetail');
    }

    public function lastLogin()
    {
        return $this->hasOne('App\LoginDetail')->latest();
    }
}
