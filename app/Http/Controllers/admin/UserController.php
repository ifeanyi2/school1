<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    // validating only logged in users to view related pages
    public function __construct()
    {
        
        $this->middleware('auth');
    }

    //display all user table
    public function index()
    {
        $data['allData'] = User::all()->sortByDesc('id');

        return view('admin.user.index', $data);
    }

    //view to add new user(s)
    public function addUserView(){
        return view('admin.user.add_user');
    }

    //save user form
    public function StoreUser(Request $request){
        
        $validationData = $request->validate([
            'email' => 'required|unique:users|email|max:255',
            'name' => "required|string|max:255",
            "password" => "required|confirmed|min:8|max:10",
            "usertype" => "required"
        ]);

        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = [
            'message' => 'User account created',
            'alert-type' => 'success'
        ];

        return redirect()->route('view.user')->with($notification);

    }

    // edit user form view
    public function EditUserView($id){
       $editUser = User::find($id);
       return view('admin.user.edit_user', compact('editUser'));
    }

    // update user details
    public function UpdateUser(Request $request, $id){

        $validationData = $request->validate([
            'email' => 'required|max:255',
            'name' => "required|string|max:255",
            "usertype" => "required"
        ]);

        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        $notification = [
            'message' => 'User account Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('view.user')->with($notification);

        
    }

    public function destroy($id)
    {
        $user = User::find($id);
        @unlink('uploads/user_images/'.$user->image);
        $user->delete();
        $notification = [
            'message' => 'User account deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('view.user')->with($notification);
    }


}
