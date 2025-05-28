<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\CourseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    private CourseService $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function index(Request $request)
    {
        $search = $request->query('search');

        $courses = Course::when($search, fn($q) =>
        $q->where('title', 'like', "%{$search}%")
        )
            ->orderBy('created_at', 'desc')
            ->paginate(12)
            ->withQueryString();

        return view('courses.index', compact('courses', 'search'));
    }

    // GET /courses/create
    public function create()
    {
        return view('courses.create');
    }

    // POST /courses
    public function store(Request $request)
    {
        $course = new Course();

        $course->title = $request->input('title');
        $course->owner_id = Auth::id();
        $course->description = $request->input('description');

        $course->save();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Course created successfully.');
    }

    // GET /courses/{course}
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    // GET /courses/{course}/edit
    public function edit(Course $course)
    {
        // показать форму редактирования курса
    }

    // PUT/PATCH /courses/{course}
    public function update(Request $request, Course $course)
    {
        // обновить курс
    }

    // DELETE /courses/{course}
    public function destroy(Course $course)
    {
        // удалить курс
    }
}
