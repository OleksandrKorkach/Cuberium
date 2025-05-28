<?php

namespace App\Services;

use App\Models\Group;

class GroupService
{
    public function getGroupsByUser(int $userId)
    {
        return Group::query()
            ->join('course_group_user', 'groups.id', '=', 'course_group_user.group_id')
            ->where('course_group_user.user_id', $userId)
            ->select('groups.*')
            ->get();
    }
}
