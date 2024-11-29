<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnlineCourseController extends Controller
{
    //
    public function index(){
        return view('front.onlinecourse.mainpage')
    }
}
