<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use DB;
use Spatie\QueryBuilder\QueryBuilder;
use SoftDeletes;

class MobileApiController extends Controller
{
  public function index()
    {   
    	
         $mobilepost = QueryBuilder::for(Post::class)
         	->where('is_published', '=', 1)
		    ->allowedFilters(['mainModule_id','id'])
		    ->allowedSorts('created_at')
		    ->paginate()
		    ->appends(request()->query());

        return response(['mobilepost' => $mobilepost,'message' => 'Retrieved successfully'], 200);
        
    }

    public function show(mobilepost $mobilepost)
    {
        return response(['mobilepost' => $mobilepost,'message' => 'Retrieved successfully'], 200);
    }

}
