<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students=Student::paginate(3);
        return view('student_data',compact('students')) ;
    }

    // public function all(){
    //     $students=Student::all();
    //     return view('student_data',compact('students'));
    // }

    public function add_student(){
       return view('add_student');
    }

    // function to add student
    public function store(Request $request){

        // validation
        $request->validate([
            'name'=> 'required | min:2 | max:20',
            'course'=> 'required | min:2 | max:50',
            'fee'=> 'required'
        ]);

        Student::create([
            'name'=> $request -> name,
            'course'=> $request -> course,
            'fee'=> $request -> fee
        ]);

        session()->flash('success','students add succesfuly');
        return redirect(url('/add'));
    }

    public function edit($id){
        $student=Student::findOrFail($id);
        return view('edit_student',compact('student'));
    }

    // function to update student
    public function update(Request $request,$id){
        // validation
        $request->validate([
            'name'=> 'required | min:2 | max:20',
            'course'=> 'required | min:2 | max:50',
            'fee'=> 'required'
        ]);

        $student=Student::findOrFail($id);
        $student->update([
            'name'=> $request -> name,
            'course'=> $request -> course,
            'fee'=> $request -> fee
        ]);
        session()->flash('success','students update succesfuly');
        return redirect(url('/'));
    }


     public function delete($id){
        $student=Student::findOrFail($id)->delete();
        session()->flash('success','students deleted succesfuly');
        return redirect(url('/'));
     }

     public function search(Request $request){

        $search = $request->input('search');

        $students = Student::query()
           ->where('name', 'LIKE', "%{$search}%")
        //    ->orWhere('course', 'LIKE', "%{$search}%")
           ->get();

          return view('search', compact('students'));

     }
}
