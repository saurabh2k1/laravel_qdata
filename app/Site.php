<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
        'code', 'name', 'contact_person', 'address',
        'created_by', 'updated_by'
    ];
}
