<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\CourseService;
use App\Services\GroupService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private GroupService $groupService;
    private CourseService $courseService;

    public function __construct(GroupService $groupService, CourseService $courseService)
    {
        $this->groupService = $groupService;
        $this->courseService = $courseService;
    }


    public function index()
    {
        $user_courses  = $this->courseService->getCourseByUser(Auth::id());
        $user_groups = $this->groupService->getGroupsByUser(Auth::id());

        return view('dashboard', compact('user_courses', 'user_groups'));
    }
}

