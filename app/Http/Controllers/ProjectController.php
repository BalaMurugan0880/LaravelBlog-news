<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\CategoryPost;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;
use DB;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $post = Post::orderBy('id', 'DESC')->where('post_type', 'post')->where('is_published', '1')->get();
        $category = Category::orderBy('id', 'DESC')->where('is_published', '1')->get();
        $categorypost = CategoryPost::orderBy('id', 'DESC')->get();
        

 


        return response([ 'post' => ProjectResource::collection($post),'category' => ProjectResource::collection($category),'categorypost' => ProjectResource::collection($categorypost), 'message' => 'Retrieved successfully'], 200);
        
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
        // return response(['post' => new ProjectResource($post), 'message' => 'Retrieved successfully'], 200);
    }

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
