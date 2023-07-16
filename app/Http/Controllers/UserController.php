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
    public function mypage(){
        $user = User::where('id',2)->get();
        dd($user);
        $user = User::first;
        return view('myPage')->with(["user"=>$user]);
    }
}
