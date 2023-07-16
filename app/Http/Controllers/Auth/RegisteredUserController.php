<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Models\Course;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Course $course): View
    {
        return view('auth.register')->with(['courses'=>$course->get()]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'course_id' => ['required', 'integer'],
            'student_number' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'grade' => ['required', 'integer'],
            'admission' => ['required', 'integer'],
        ]);
        
        $user = User::create([
            'course_id' =>  $request->course_id,
            'student_number' =>  $request->student_number,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'grade' =>  $request->grade,
            'admission' =>  $request->admission,
        ]);
        
        event(new Registered($user));

        Auth::login($user);
        
        return redirect(RouteServiceProvider::HOME);
    }
}
