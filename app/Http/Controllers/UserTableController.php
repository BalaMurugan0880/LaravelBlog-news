<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\role;
use Illuminate\Support\Facades\Session;

class UserTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->select('id','name','email','role')->get();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $id = Auth::user()->id;

       $users = DB::table('users')->select('id','name','email','role')->where(['users.id' => $id])->get();
       return view('admin.user.edit',compact('users'));

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
    public function edit(User $user)
    {
      return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

       $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',

        ],
            [
                'email.required' => 'Enter Email',
                'name.required' => 'Enter name',
            ]);


        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->role == "Admin") {
          $test = DB::table('role_user')->where('user_id', $request->userid)->update(['role_id' => 1]);
        }elseif ($request->role == "Editor") {
           $test = DB::table('role_user')->where('user_id', $request->userid)->update(['role_id' => 2]);
        }elseif ($request->role == "Writer") {
           $test = DB::table('role_user')->where('user_id', $request->userid)->update(['role_id' => 3]);
        }

        

        $user->save();

        Session::flash('message', 'User updated successfully');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        Session::flash('delete-message', 'User deleted successfully');
        return redirect()->route('user.index');
    }
}
