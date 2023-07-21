<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Subject;
use App\Models\Registration;
use App\Models\Course_category;
use App\Models\Category;
use App\Models\Review;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function review(Subject $subject){
        $user = User::first();
        return view('review')->with(["user"=>$user, "subject"=>$subject]);
    }
    
    public function review_store(Request $request, Review $reviews){
        $user = User::first();
        $subject = $request['subject'];
        $level = $request['level'];
        $understandability = $request['understandability'];
        $benefit = $request['benefit'];
        $registrations = Registration::where('user_id',$user->id)->where('subject_id', $subject)->update([
                    'is_reviewed' => true,
                ]);
        $review = [
                'user_id'=>$user->id,
                'subject_id'=>$subject,
                'level'=>$level,
                'understandability'=>$understandability,
                'benefit'=>$benefit,
                ];
        $reviews->fill($review)->save();
        return redirect("/review_completed");
    }
    
    public function review_completed(){
        $user = User::first();
        $review = Review::where('user_id',$user->id)->where('subject_id', 1)->get();
        return view('reviewCompleted');
    }
    
    public function subject(Category $category){
        $user = User::first();
        $course_category = Course_category::where('course_id',$user->course_id)->get();
        return view('subject')->with(["user"=>$user,"course_categories"=>$course_category, "categories"=>$category->get()]);
    }
    
    public function subject_review(Subject $subject){
        $user = User::first();
        $course_category = Course_category::where('course_id',$user->course_id)->where('subject_id', $subject->id)->first();
        $reviews = Review::where('subject_id',$subject->id)->get();
        $level=0;
        $understandability=0;
        $benefit=0;
        $sum=0;
        if($reviews != null){
            foreach($reviews as $review){
                $level=$level+$review->level;
                $understandability=$understandability+$review->understandability;
                $benefit=$benefit+$review->benefit;
                $sum = $sum+1;
            }
            $level=$level/$sum;
            $understandability=$understandability/$sum;
            $benefit=$benefit/$sum;
        }
        return view('subject_review')->with([
            "course_category"=>$course_category, 
            "level"=>$level,
            "understandability"=>$understandability,
            "benefit"=>$benefit
            ]);
    }
}
