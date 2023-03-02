<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
use App\Models\Studentcourse;


class studentController extends Controller
{
    public function index()
    {
        $data2= Course::all();
        $data= Student::paginate(5);
        return view('student.student',compact('data','data2'));

    }
    public function store(Request $request)
    {

        // $arr=array(1,2,3);
        // $input =new Studentcourse;
        // $input->student_id=2;
        // $input->course_id=json_encode($arr);
        // $input->save();


        $request->validate([
            'Studentname' => 'required',
            'Phone' => 'required|size:10',
            'image' => 'required',
        ]);

        $name=request('Studentname');
        $phone=request('Phone');
        $image=request('image');

        if(request()->hasFile('image'))
        {
            $extension =request('image')->extension();
            $file ='user_pic_'. time().'.'.$extension;
            request('image') ->storeAs('image',$file);


      $student=  Student::create([
            'Studentname'=>$name,
            'Phone'=>$phone,
            'image'=>$file
        ]);


foreach($request->course_id as $course){
         Studentcourse::create([
           'student_id'=> $student->student_id,
            'course_id'=>$course
        ]);
    }
        return redirect()->route('student');
        }

}
public function show($id)
{
    $data= Student::findOrFail(decrypt($id));
    $course= Course::all();

   $id=decrypt($id);
    $data2= Studentcourse::with('courserelation')->with('studentrelation')->where('student_id',$id)->get();

    return view('student.studentdetails',compact('data','data2','course'));
}

public function stdetailupdate(Request $request,$id)
{

    $data= Student::findOrFail(decrypt($id));

    $request->validate([
        'Studentname' => 'required',
        'Phone' => 'required',
        'image' => 'required',

    ]);

    $name=request('Studentname');
    $phone=request('Phone');
    $image=request('image');

    if(request()->hasFile('image'))
    {
        $extension =request('image')->extension();
        $file ='user_pic_'. time().'.'.$extension;
        request('image') ->storeAs('image',$file);


        $data->update([
        'Studentname'=>$name,
        'Phone'=>$phone,
        'image'=>$file

    ]);
    return redirect()->refresh();
    }


}
public function stcoursedestroy($id)
    {
        $student= Studentcourse::findOrFail(decrypt($id));
        $student->delete();
        return redirect()->route('student');
    }
public function destroy($id)
    {
        $student= Student::findOrFail(decrypt($id));
        $student->delete();
        return redirect()->refresh();
    }
}
