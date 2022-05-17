<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Display user profile page
    public function viewProfile(){
        $id = Auth::user()->id;

        $user = User::find($id);

        return view('admin.user.view_profile', compact('user'));
    }


    // User profile edit page
    public function profileEdit(){
        $id = Auth::user()->id;

        $user = User::find($id);

        return view('admin.user.edit_profile', compact('user'));
    }

    public function profileStore(Request $request){
        $validationData = $request->validate([
            'email' => 'required|max:255',
            'name' => "required|string|max:255",
            'gender' => 'required|string',
            'facebook' => 'url',
            'twitter' => 'url',
            'linkedin' => 'url'
            
        ]);

        $data = User::find(Auth::user()->id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->linkedin = $request->linkedin;
        $data->gender = $request->gender;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('uploads/user_images'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/user_images'), $filename);
            $data['image'] = $filename;
        }

        $data->save();
        $notification = [
            'message' => 'Updated Successfully!!!',
            'alert-type' => 'success'
        ];
        return redirect()->route('profile.view')->with($notification);
    }

    public function passwordView(){
        return view('admin.user.edit_password');
    }

    public function passwordUpdate(Request $request){
        $validationData = $request->validate([
            'current_password' => 'required|max:10|min:8',
            'password' => "required|confirmed|min:8|max:10",
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = [
                'message' => 'Password changed Successfully, Login with new password',
                'alert-type' => 'success'
            ];

            return redirect()->route('login')->with($notification);
        }else{
            $notification = [
                'message' => 'Failed Validation, try again',
                'alert-type' => 'danger'
            ];
            return redirect()->back()->with($notification);
        }


    }
}
