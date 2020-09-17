<?php

namespace App\Http\Controllers\DashBoard;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index()
    {

        $courses = Course::orderBy('id', 'DESC')->paginate(25);
        return view('dashboard.users.courses', compact('courses'));
    }

    public function enroll_course($course_id)
    {
        $course = Course::findOrFail($course_id);
        auth()->user()->courses()->attach(['course_id' => $course->id]);
        flash()->success('done');
        return redirect(url('user/show/courses'));
    }

    public function un_enroll_course($course_id)
    {
        $course = Course::findOrFail($course_id);
        auth()->user()->courses()->detach(['course_id' => $course->id]);
        flash()->success('drop out from course '.$course->name .' done');
        return redirect(url('user/show/courses'));
    }
}
