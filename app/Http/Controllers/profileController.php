<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\role;
use Illuminate\Support\Facades\Session;

class profileController extends Controller
{
        public function index()
    {
        $user_id = Auth::id();
        $users = DB::table('users')->select('name','email','role','profilepic','instagram','facebook','biographical')->where('id', $user_id)->first();
        return view('/admin/user/profile', compact('users'));
    }

    public function update(Request $request){
    	
    	$getid = Auth::id();
        $getname = $request->input('name');
        $getemail = $request->input('email');
        $getrole = $request->input('role');
        $getbio = $request->input('bio');
        $getprofilepic = $request->input('thumbnail');
        $getinstagram = $request->input('instagram');
        $getfacebook = $request->input('facebook');


        $data2 = DB::table('users')->where('id', $getid)->update(['name' =>  $getname,'email' => $getemail, 'role' => $getrole, 'biographical' => $getbio, 'profilepic' => $getprofilepic, 'instagram' => $getinstagram, 'facebook' => $getfacebook]);

        $user_id = Auth::id();
        $users = DB::table('users')->select('name','email','role','profilepic','instagram','facebook','biographical')->where('id', $user_id)->first();
        Session::flash('message', 'Profile updated successfully');
        return view('/admin/user/profile', compact('users'));
    }
}
