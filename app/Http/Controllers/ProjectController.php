<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\CategoryPost;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;
use DB;
use Spatie\QueryBuilder\QueryBuilder;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $post = Post::orderBy('id', 'DESC')->where('post_type', 'post')->where('is_published', '1')->get();
        // $category = Category::orderBy('id', 'DESC')->where('is_published', '1')->get();
        // $categorypost = CategoryPost::orderBy('id', 'DESC')->get();

        // $test = DB::table('posts')->join('category_posts','category_posts.post_id', '=', 'posts.id')->join('categories','category_posts.category_id', '=', 'categories.id')->join('mainmodule','categories.mainModule_id', '=' , 'mainmodule.id')->select('posts.title','categories.category_name','category_posts.category_id','mainmodule.module_name')->get();

         $post = QueryBuilder::for(Post::class)
    ->allowedFilters(['mainModule_id','id'])
    ->get();




        return response(['post' => $post,'message' => 'Retrieved successfully'], 200);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
   public function show(Post $post)
    {
        return response(['post' => new ProjectResource($post), 'message' => 'Retrieved successfully'], 200);
    }


    // public function getPosts($id)
    // {

    //     return Post::find($id);
    //     // return response(['post' => new ProjectResource($post), 'message' => 'Retrieved successfully'], 200);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
