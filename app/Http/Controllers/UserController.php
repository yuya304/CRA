<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Registration;
use App\Models\Course_category;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function my_page(){
        $user = Auth::user();
        return view('myPage')->with(["user"=>$user]);
    }
    
    public function my_credits(Category $category){
        $user = Auth::user();
        $course_category = Course_category::where('course_id',$user->course_id)->get();
        $registration = Registration::where('user_id', $user->id)->get();
        return view('myCredits')->with(['course_categories'=>$course_category, 'user'=>$user, 'registrations'=>$registration, 'categories'=>$category->get()]);
    }
    
    public function graduation_check(){
        $user = Auth::user();
        $registrations = Registration::where('user_id',$user->id)->where('is_definitive', true)->get();
        $credits = [['count'=>0, 'sum'=>0, 'flag'=>0],
                    ['count'=>0, 'sum'=>0, 'flag'=>0],
                    ['count'=>0, 'sum'=>0, 'flag'=>0],
                    ['count'=>0, 'sum'=>0, 'flag'=>0],
                    ['count'=>0, 'sum'=>0, 'flag'=>0],
                    ['count'=>0, 'sum'=>0, 'flag'=>0],
                    ['count'=>0, 'sum'=>0, 'flag'=>0],
                    ['count'=>0, 'sum'=>0, 'flag'=>0],
                    ['count'=>0, 'sum'=>0, 'flag'=>0],
                    ['count'=>0, 'sum'=>0, 'flag'=>0],
                    ['count'=>0, 'sum'=>0, 'flag'=>0],
                    ['count'=>0, 'sum'=>0, 'flag'=>0],
                    ['count'=>0, 'sum'=>0, 'flag'=>0],
                    ['count'=>0, 'sum'=>0, 'flag'=>0],
                    ['count'=>0, 'sum'=>0, 'flag'=>0],
                    ['count'=>0, 'sum'=>0, 'flag'=>0]];
        foreach($registrations as $registration){
            $course_category = Course_category::where('course_id',$user->course_id)->where('subject_id', $registration->subject_id)->first();
            $credits[$course_category->attribute_id-1]["sum"] += $registration->subject->credit;
            $credits[$course_category->attribute_id-1]["count"] += 1;
        }
        $category_sum = $credits[8]["sum"]+$credits[9]["sum"]+$credits[10]["sum"]+$credits[11]["sum"]+$credits[12]["sum"]+$credits[13]["sum"]+$credits[14]["sum"];
        $all_sum = 0;
        foreach($credits as $credit){
            $all_sum += $credit["sum"];
        }
        return view('graduationCheck')->with(['user'=>$user, 'credits'=>$credits, 'all_sum'=>$all_sum, 'category_sum'=>$category_sum]);
    }
    
    
}
