<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;

class UserController extends Controller
{
    public function profile(){
        return view('admin.profile', array('user' => Auth::user() ));
    }

    public function update(Request $request){
        // Handle user upload avatar
        if( $request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename    = time() . '.' . $avatar->getClientOriginalExtension();
            $location    = public_path('img/uploads/avatars/' . $filename);

            Image::make($avatar)->resize(300,300)->save($location);
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();

        }

        return view('admin.profile', array('user' => Auth::user() ));
    }
}
