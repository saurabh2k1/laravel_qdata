<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Site extends Model
{
    use SoftDeletes;

    
    protected $fillable = [
        'code', 'name', 'contact_person', 'address',
        'created_by', 'updated_by'
    ];

    protected $dates = ['deleted_at'];

    public static function boot() {
        parent::boot();
        static::creating(function($model){
            $user = Auth::user();
            $model->created_by = $user->id;
            $model->updated_by = $user->id;
        });
        static::updating(function($model){
            $user = Auth::user();
            $model->updated_by = $user->id;
        });
    }

    public function users(){
        return $this->nelongsToMany('App\Users', 'site_user');
    }
}
