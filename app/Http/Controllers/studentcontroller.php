<?php

namespace App\Http\Controllers;
 use App\Models\Student;


use Illuminate\Http\Request;
use Hash;

class studentcontroller extends Controller
{
   public function insert(Request $request){
    $student=new Student();
    

    $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:students',
        'location'=>'required',
        'password'=>'required|min:6|confirmed',
        'password_confirmation'=>'required'
    ]);
    
    $student->name=$request->name;
    $student->email=$request->email;
    $student->location=$request->location;
    $student->password=Hash::make($request->password);
     $student->confirm_password=Hash::make($request->password_confirmation);

    $result= $student->save();

    return redirect('fetch_data');

           
   }

  public function fetch(){
    $student=Student::all();

    $data=compact('student');

    return view('fetch_details')->with($data);
  }
  public function delete($id){
    Student::find($id)->delete();
    return back();
  }
  public function edit_page($id){
    $student=  Student::find($id);
   $data=compact('student');

   return view('update_page')->with($data);
           


  }
  public function update(Request $request,$id){

       $student= Student::find($id);
      $student->name=$request->name;
      $student->email=$request->email;
      $student->location=$request->location;
      $student->save();
      return redirect('fetch_data');
  }
         
}
