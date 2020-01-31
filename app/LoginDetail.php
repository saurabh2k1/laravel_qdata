<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'terminal', 'timestamp',
    ];

    protected $dates = [
        'timestamp',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
