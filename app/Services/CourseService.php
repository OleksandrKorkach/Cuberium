<?php

namespace App\Services;

use App\Models\Course;

class CourseService
{
    public function getCourseByUser(int $ownerId)
    {
        return Course::query()
            ->where('owner_id', $ownerId)
            ->get();
    }
}
