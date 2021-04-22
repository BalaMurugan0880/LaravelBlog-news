<?php

namespace App\Http\Controllers;

use App\MainModule;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class mainModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $mainModule = MainModule::orderBy('id', 'DESC')->get();
        return view('admin.module.index', compact('mainModule'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.module.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
            'name' => 'required|unique:mainmodule',
            
        ],
            [
                'name.required' => 'Enter name',
                'name.unique' => 'Main Module already exist',
                
            ]);

        $mainModule = new MainModule();
        $mainModule->name = $request->name;
        $mainModule->user_id = Auth::id();
        $mainModule->save();

        Session::flash('message', 'Main Module created successfully');
        return redirect()->route('module.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MainModule $module)
    {
        return view('admin.module.edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, MainModule $module)
    {
        $this->validate($request, [
            'name' => 'required|unique:mainmodule,name,' . $module->id,
        ],
            [
                'name.required' => 'Enter name',
                'name.unique' => 'Category already exist',
            ]);

      
        $module->user_id = Auth::id();
        $module->name = $request->name;
        $module->save();

        Session::flash('message', 'Module updated successfully');
        return redirect()->route('module.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::delete('delete from mainmodule where id = ?',[$id]);

        Session::flash('delete-message', 'Module deleted successfully');
        return redirect()->route('module.index'); 
    }
}
