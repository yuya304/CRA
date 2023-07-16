<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Registration;
use App\Models\Course_category;
use App\Models\Category;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function provisional(Category $category){
        $user = User::first();
        $course_category = Course_category::where('course_id',$user->course_id)->get();
        $registration = Registration::where('user_id',$user->id)->get();
        return view('provisional')->with(['course_categories'=>$course_category, 'categories'=>$category->get(), "registrations"=>$registration, "user"=>$user]);
    }
    
    public function provisional_store(Request $request){
        $user = User::first();
        $inputs = $request['subjects'];
        if($inputs !== null){
            foreach($inputs as $input){
                $registrations = Registration::where('user_id',$user->id)->get();
                $flag = 1;
                foreach($registrations as $registration_limit){
                    if($registration_limit->subject_id == $input){
                        $flag = 0;
                    }
                }
                if($flag == 1){
                    $provisional = [
                            'user_id'=>$user->id,
                            'subject_id'=>$input,
                            'is_definitive'=>false
                            ];
                    $registration=new Registration();
                    $registration->fill($provisional)->save();
                }
            }
        }
        return redirect("/provisional_completed");
    }
    
    public function provisional_completed(){
        $user = User::first();
        $registration = Registration::where('user_id',$user->id)->get();
        $course_category = Course_category::where('course_id',$user->course_id)->get();
        return view('provisionalCompleted')->with(['registrations'=>$registration, 'user'=>$user, 'course_categories'=>$course_category]);
    }
    
    public function definitive(Category $category){
        $user = User::first();
        $course_category = Course_category::where('course_id',$user->course_id)->get();
        $registration = Registration::where('user_id',$user->id)->get();
        return view('definitive')->with(['course_categories'=>$course_category, 'categories'=>$category->get(), "registrations"=>$registration, "user"=>$user]);
    }
    
    public function definitive_store(Request $request){
        $user = User::first();
        $inputs = $request['subjects'];
        if($inputs !== null){
            foreach($inputs as $input){
                $registrations = Registration::where('user_id',$user->id)->get();
                $flag = 1;
                foreach($registrations as $registration_limit){
                    if($registration_limit->subject_id == $input){
                        $flag = 0;
                    }
                }
                if($flag == 1){
                    $definitive = [
                            'user_id'=>$user->id,
                            'subject_id'=>$input,
                            'is_definitive'=>true
                            ];
                    $registration=new Registration();
                    $registration->fill($definitive)->save();
                }
            }
        }
        return redirect("/definitive_completed");
    }
    
    public function definitive_completed(){
        $user = User::first();
        $registration = Registration::where('user_id',$user->id)->get();
        $course_category = Course_category::where('course_id',$user->course_id)->get();
        return view('definitiveCompleted')->with(['registrations'=>$registration, 'user'=>$user, 'course_categories'=>$course_category]);
    }
}
