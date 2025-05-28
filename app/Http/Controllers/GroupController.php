<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Group;
use App\Services\GroupService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    private GroupService $groupService;

    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }

    public function index(Request $request)
    {

    }

    public function create(Course $course)
    {
        return view('groups.create', compact('course'));
    }

    public function store(Course $course, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $group = $course->groups()->create($data);

        return redirect()
            ->route('courses.show', $course)
            ->with('success', 'Group created successfully.');
    }


    public function show(Group $group)
    {
        $group->load([
            'course',
            'users',
            'tasks' => function($q) {
                $q->latest();
            },
        ]);

        return view('groups.show', compact('group'));
    }

    public function edit(Group $group)
    {
        //
    }

    public function update(Request $request, Group $group)
    {

    }

    public function destroy(Group $group)
    {

    }


}
