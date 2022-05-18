<?php

namespace App\Http\Controllers\admin\setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    public function viewStudentYear(){
        $data['allData'] = StudentYear::all()->sortByDesc('id');
        return view('admin.setup.year.view_year', $data);
    }

    public function studentYearAdd(){
        return view('admin.setup.year.add_year');
    }

    public function studentYearStore(Request $request){
        $validation = $request->validate([
            'name' => 'required|string|max:255|unique:student_years,name'
        ]);

        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();

        $notification = [
            'message' => 'Student year added successfully!!',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.year.view')->with($notification);

    }
    public function studentYearEdit($id){
        $data = StudentYear::find($id);
        return view('admin.setup.year.edit_year', compact('data'));

    }

    public function studentYearUpdate(Request $request, $id){
        $data = StudentYear::find($id);

        $validationData = $request->validate([
            'name' => 'required|max:255|unique:student_years',
        ]);


        $data->name = $request->name;
        $data->save();

        $notification = [
            'message' => 'Student year Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.year.view')->with($notification);
    }

    public function destroy($id)
    {
        $user = StudentYear::find($id);

        $user->delete();
        $notification = [
            'message' => 'Student year deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.year.view')->with($notification);
    }
}
