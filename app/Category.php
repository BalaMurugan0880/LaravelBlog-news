<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['user_id', 'thumbnail', 'category_name','mainModule_id', 'category_slug', 'is_published'];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'category_posts');
    }

    public function mainModule()
    {
        return $this->belongsTo(MainModule::class, 'id');
    }




}




