<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=['avatar','about','user_id','facebook','youtube','linkedin'];
     public function user()
    {
        return $this->belongsTo('App\User');
    }
}
