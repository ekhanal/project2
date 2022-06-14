<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;

class courseController extends Controller
{
    public function create(Request $request){
        if($request->isMethod('get')){
            return view('pages.course.add');
        }
        if($request->isMethod('post')){
             // dd($request->all());
            $request->validate([ 
                'cname' => 'required',
                'price' => 'required',
                'Duration' => 'required'
            ]); //validation part 

}
   // insertion part 
   if( course::create($request->all())){
    return redirect()->back()->with('success','data inserted successfully.');
   }else{
    return redirect()->back()->with('error','data couldnot inserted.');

   }

    }
    public function index(){
        $courseData = course::all();
        return view('pages.course.index',[
            'courseData' => $courseData
        ]);
    }
    public function edit(Request $request,$id){
        if($request->isMethod('get')){
            $editData = course::findOrFail($id);
            return view('pages.course.edit',['editData' => $editData]);
        }
        if($request->isMethod('post')){
            $update = course::findOrFail($id);
            $update->update($request->all());
            return redirect('display-course')->with('success','Data updated successfully.');

        }
    }
    public function destroy($id){
        course::findOrFail($id)->delete();
        return redirect()->back()->with('success','Data deleted successfully.');
    }
    public function show($id){
        $moreData = course::findOrfail($id);
        return view('pages.course.show',[
            'singleData' => $moreData
        ]);

}
}