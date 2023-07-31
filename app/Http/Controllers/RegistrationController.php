<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Registration;
use App\Models\Course_category;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function provisional(Category $category){
        $user = Auth::user();
        $course_category = Course_category::where('course_id',$user->course_id)->get();
        $registration = Registration::where('user_id',$user->id)->get();
        return view('provisional')->with(['course_categories'=>$course_category, 'categories'=>$category->get(), "registrations"=>$registration, "user"=>$user]);
    }
    
    public function provisional_store(Request $request){
        $user = Auth::user();
        $inputs = $request['subjects'];
        if($inputs !== null){
            foreach($inputs as $input){
                $registrations = Registration::where('user_id',$user->id)->get();
                $flag = 0;
                //仮登録済みなら追加しないように判定
                foreach($registrations as $registration_limit){
                    if($registration_limit->subject_id == $input){
                        $flag = 1;
                    }
                }
                if($flag == 0){
                    $provisional = [
                            'user_id'=>$user->id,
                            'subject_id'=>$input,
                            'is_definitive'=>false,
                            'is_reviewed'=>false,
                            ];
                    $registration=new Registration();
                    $registration->fill($provisional)->save();
                }
            }
        }
        return redirect("/provisional_completed");
    }
    
    public function provisional_completed(){
        $user = Auth::user();
        $registrations = Registration::where('user_id',$user->id)->get();
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
        return view('provisionalCompleted')->with(['user'=>$user, 'credits'=>$credits, 'all_sum'=>$all_sum, 'category_sum'=>$category_sum]);
    }
    
    public function definitive(Category $category){
        $user = Auth::user();
        $course_category = Course_category::where('course_id',$user->course_id)->get();
        $registration = Registration::where('user_id',$user->id)->get();
        return view('definitive')->with(['course_categories'=>$course_category, 'categories'=>$category->get(), "registrations"=>$registration, "user"=>$user]);
    }
    
    public function definitive_store(Request $request, Registration $registration){
        $user = Auth::user();
        $inputs = $request['subjects'];
        if($inputs !== null){
            //仮登録を本登録に変更
            foreach($inputs as $input){
                $registration->where('user_id',$user->id)->where('subject_id',$input)->update([
                    'is_definitive' => true,
                ]);
            }
        }
        return redirect("/definitive_completed");
    }
    
    public function definitive_completed(){
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
        return view('definitiveCompleted')->with(['user'=>$user, 'credits'=>$credits, 'all_sum'=>$all_sum, 'category_sum'=>$category_sum]);
    }
    
    public function registration_delete(Request $request){
        $user = Auth::user();
        $delete = $request['subject'];
        //履修登録を削除
        $registration = new Registration();
        $registration->where('user_id',$user->id)->where('subject_id',$delete)->delete();
        $registration = new Registration();
        $registration->where('user_id',$user->id);
        return redirect('/my_credits');
    }
}