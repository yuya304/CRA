<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'student_number' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'grade' => ['required', 'integer'],
            'admission' => ['required', 'integer'],
            'course_id' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255'],
            
        ];
    }
}
