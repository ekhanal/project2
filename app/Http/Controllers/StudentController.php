<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    public function create(Request $request){
        if($request->isMethod('get')){
            return view('pages.student.add');
        }
        if($request->isMethod('post')){
            // dd($request->all());
            $request->validate([ 
                'fname' => 'required|min:3|max:12',
                'lname' => 'required',
                'email' => 'required|unique:students,email',
                'gender'=>'required',
                'city'=>'required',
                'country'=>'required',
                'phone'=>'required|unique:students,phone' ]); //validation part 

            // insertion part 
           if( Student::create($request->all())){
            return redirect()->back()->with('success','data inserted successfully.');
           }else{
            return redirect()->back()->with('error','data couldnot inserted.');

           }



        }
    }

    public function index(){    
        $studentData = Student::all();
        return view('pages.student.index',[
            'studentData' => $studentData
        ]);
    }

    public function edit(Request $request,$id){
        if($request->isMethod('get')){
            $editData = Student::findOrFail($id);
            return view('pages.student.edit',['editData' => $editData]);
        }
        if($request->isMethod('post')){
            $update = Student::findOrFail($id);
            $update->update($request->all());
            return redirect('display-student')->with('success','Data updated successfully.');

        }
    }

    public function destroy($id){
        Student::findOrFail($id)->delete();
        return redirect()->back()->with('success','Data deleted successfully.');
    }

    public function show($id){
        $moreData = Student::findOrfail($id);
        return view('pages.student.show',[
            'singleData' => $moreData
        ]);
        // $moreData = Student::where('id','=',$id);

    }

    public function toggleStatus(Request $request){
        if($request->isMethod('post')){
           if($request->submit == 'active'){
            $data = Student::findOrfail($request->sid);
            $data->status = 0;
            $data->update();
            return redirect()->back()->with('success','Status updated successfully.');
           }elseif($request->submit == 'inactive'){
            $data = Student::findOrfail($request->sid);
            $data->status = 1;
            $data->update();
            return redirect()->back()->with('success','Status updated successfully.');
           }
        }
    }
}
