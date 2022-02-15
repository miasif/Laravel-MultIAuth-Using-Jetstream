<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MainUserController extends Controller
{
    public function logout(){
            Auth::logout();
            return redirect()->route('login');

    }
    public function userProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.profile.view_profile',compact('user'));
    }
    public function userProfileEdit(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('user.profile.edit_profile',compact('editData'));
    }
    public function userProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $fileName = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$fileName);
            $data['profile_photo_path'] = $fileName;
        }
        $data->save();
        return redirect()->route('user_profile')->with('message','Data Update Successfully');


    }
    public function userPasswordChange(){
        return view('user.profile.change_password');
    }


    public function userPasswordUpdate(Request $request){
        $data = User::find(Auth::user()->id);
        if(!Hash::check($request->oldPassword,$data->password)){
            return redirect()->back()->with('error','Current Password Not Match');
        }
        $data->password = Hash::make($request->password);
        $data->save();
        return redirect()->route('user_profile')->with('message','Password Update Successfully');
    }
}














        // $validateData = $request->validate([
    //        'old_password' => 'required',
    //        'password' => 'required|confirmed',
    //    ]);
    //    $hashedPassword = Auth::user()->password;
    //    if(Hash::check($request->oldPassword, $hashedPassword)){
    //        $user = User::find(Auth::id());
    //        $user->password = Hash::make($request->password);
    //         $user->save();
    //         Auth::logout();
    //         return redirect()->route('login')->with('message','password Update Successfully');

    //     }else{
    //         return redirect()-back()->with('error','something wrong');
    //     }

    // }
// }

