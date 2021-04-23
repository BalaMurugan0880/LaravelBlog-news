<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainModule extends Model
{
	protected $table = 'mainmodule';

    protected $fillable = ['user_id','module_name'];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

       public function categories()
    {
        return $this->hasMany(Category::class, 'mainModule_id');
    }
}




