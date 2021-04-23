<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\CategoryPost;
use Request;
use App\Http\Resources\ProjectResource;
use DB;
class CategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $constraints = array_only(Request::input(), 'subject');
        $category = DB::table('categories')->join('mainmodule','categories.mainModule_id', '=', 'mainmodule.id')->select('categories.category_name','mainmodule.module_name')->where('categories.category_name',$constraints)->get();

       

//         SELECT *
// FROM   B
// WHERE  NOT EXISTS (SELECT 1 
//                    FROM   A 
//                    WHERE  A.ID = B.ID)

        return response(['category' => $category,'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

        return response(['category' => $category,'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
