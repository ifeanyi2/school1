<?php

namespace App\Http\Controllers\admin\setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    // validating only logged in users to view related pages
    public function __construct()
    {

        $this->middleware('auth');
    }


    //display all classes from database
    public function viewStudents(){
        $data['allData'] = StudentClass::all()->sortByDesc('id');
        return view('admin.setup.student_class.view_class', $data);
    }

    //display add student class form
    public function studentClassAdd(){
        return view('admin.setup.student_class.add_class');
    }

    //submit student class data
    public function storeStudentClass(Request $request){
        $validation = $request->validate([
            'name' => 'required|string|max:255|unique:student_classes'
        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();

        $notification = [
            'message' => 'Student class added successfully!!',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.class.view')->with($notification);

    }


    // Edit student class form view
    public function studentClassEditView($id){
        $data = StudentClass::find($id);
        return view('admin.setup.student_class.edit_class', compact('data'));
    }

    public function studentClassUpdate(Request $request, $id){

        $data = StudentClass::find($id);

        $validationData = $request->validate([
            'name' => 'required|max:255|unique:student_classes, '.$data->id,
        ]);

       
        $data->name = $request->name;
        $data->save();

        $notification = [
            'message' => 'Student Class Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.class.view')->with($notification);
    }

    public function destroy($id)
    {
        $user = StudentClass::find($id);

        $user->delete();
        $notification = [
            'message' => 'Student class deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.class.view')->with($notification);
    }


}
