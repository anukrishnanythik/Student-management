<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;


class courseController extends Controller
{

    public function index() {
        $data= Course::withTrashed()->paginate(4);
         return view('courses.course',compact('data'));
     }
     public function store(Request $request)
     {
         $input = $request->all();
         $request->validate([
             'Coursename' => 'required',
             'Teachername' => 'required',
             'Batchtime' => 'required',
             'Teachingday' => 'required',
         ]);
         Course::create($input);

         return redirect()->route('home')->with('message',"user added succesfully!!");
        }
     public function edit($id)
     {

         $data= Course::findOrFail(decrypt($id));
         return view('courses.courseedit',compact('data'));

     }
     public function update(Request $request, $id)
     {

        $data= Course::findOrFail(decrypt($id));

         $data-> update($request->all());
        return redirect()->route('home')->with('message',"user updated succesfully!!");
     }
     public function destroy($id)
    {
        $course= Course::findOrFail(decrypt($id));
        $course->delete();
        return redirect()->route('home');
    }
     public function courseactivate($id)
     {
         $course= Course::withTrashed()->findOrFail(decrypt($id));
         $course->restore();
         return redirect()->route('home');
     }

     public function forcedelete($id)
     {
         $course= Course::withTrashed()->findOrFail(decrypt($id));
         $course->forceDelete();
         return redirect()->route('home')->with('message',"user deleted succesfully!!");
     }
}
