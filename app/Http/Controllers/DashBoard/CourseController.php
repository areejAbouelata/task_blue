<?php

namespace App\Http\Controllers\DashBoard;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

    }
    public function index()
    {

        $courses = Course::orderBy('id', 'DESC')->paginate(25);

        return view('dashboard.courses.courses', compact('courses'));
    }

    public function create(Course $item)
    {
        return view('dashboard.courses.create', compact('item'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);
        $course = Course::create($request->all());
        flash()->success('done');
        return redirect(url('admin/courses'));

    }

    public function edit($id)
    {
        $item = Course::findOrFail($id);
        return view('dashboard.courses.edit', compact('item'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'max' => 'required',
        ]);
        $item = Course::findOrFail($id);
        $item->update($request->all());
        flash()->success('done');
//        return $request->user() ;
        return redirect(url('admin/courses'));
    }
}
