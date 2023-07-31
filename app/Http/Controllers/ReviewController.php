<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Subject;
use App\Models\Registration;
use App\Models\Course_category;
use App\Models\Category;
use App\Models\Review;
use App\Models\Subject_post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function review(Subject $subject){
        $user = Auth::user();
        return view('review')->with(["user"=>$user, "subject"=>$subject]);
    }
    
    public function review_store(Request $request, Review $reviews){
        $user = Auth::user();
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
        $user = Auth::user();
        $review = Review::where('user_id',$user->id)->where('subject_id', 1)->get();
        return view('reviewCompleted');
    }
    
    public function subject(Category $category){
        $user = Auth::user();
        $course_category = Course_category::where('course_id',$user->course_id)->get();
        return view('subject')->with(["user"=>$user,"course_categories"=>$course_category, "categories"=>$category->get()]);
    }
    
    public function subject_review(Subject $subject, Subject_post $subject_post){
        $user = Auth::user();
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
            if($sum != 0){
                $level=$level/$sum;
                $understandability=$understandability/$sum;
                $benefit=$benefit/$sum;
            }
        }
        return view('subject_review')->with([
            "course_category"=>$course_category, 
            "level"=>$level,
            "understandability"=>$understandability,
            "benefit"=>$benefit,
            "subject_posts"=>$subject_post->getPaginateByLimit(10)
            ]);
    }
    
    public function review_comment_store(Request $request, Subject_post $subject_post){
        $input = $request['post'];
        $subject_post->fill($input)->save();
        return redirect('/subject_review/' . $subject_post->subject_id);
    }
}
