<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $courses = Course::limit(3)->get();
        return view('home.index', [
            'courses' => $courses
        ]);
    }
}
