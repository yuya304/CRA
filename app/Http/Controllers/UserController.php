<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Registration;
use App\Models\Course_category;
use App\Models\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function my_page(){
        $user = User::first();
        return view('myPage')->with(["user"=>$user]);
    }
    
    public function my_credits(Category $category){
        $user = User::first();
        $course_category = Course_category::where('course_id',$user->course_id)->get();
        $registration = Registration::where('user_id', $user->id)->get();
        return view('myCredits')->with(['course_categories'=>$course_category, 'user'=>$user, 'registrations'=>$registration, 'categories'=>$category->get()]);
    }
}
