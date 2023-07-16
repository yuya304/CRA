<?php

namespace App\Http\Controllers;
use App\Imports\SubjectsImport;
use App\Imports\Course_categoriesImport;
use App\Imports\ExcelImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function importView(){
        return view('import');
    }
    
    public function postSubjectsData()
    {
        Excel::Import(new SubjectsImport, request()->file('subjectFile'));
        return back();
    }
    
    public function postCourseCategoriesData()
    {
        Excel::Import(new Course_categoriesImport, request()->file('courseFile'));
        return back();
    }
}


