<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id','title', 'slug', 'content', 'category_id', 'featured'];
    protected $dates = ['deleted_at'];

    public function getFeatured($featured)
    {
        return asset($featured);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo("App\Category");
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function user()
    {
       return $this->belongsTo('App\User');
    }
}
