<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Group: ') . $group->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Course Link -->
                    <div class="mb-6">
                        <span class="text-gray-600">Course:</span>
                        <a href="{{ route('courses.show', $group->course) }}"
                           class="text-blue-600 hover:underline font-medium">
                            {{ $group->course->title }}
                        </a>
                    </div>

                    <!-- Колонки для Students і Tasks -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Students List -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-3">Students</h3>
                            @if($group->users->count())
                                <ul class="space-y-2">
                                    @foreach($group->users as $user)
                                        <li class="flex items-center justify-between bg-gray-50 border border-gray-200 rounded-lg px-4 py-2">
                                            <div>
                                                <p class="font-medium text-gray-800">{{ $user->name }}</p>
                                                <p class="text-sm text-gray-600">{{ $user->email }}</p>
                                            </div>
                                            <a href="{{ route('users.show', $user) }}"
                                               class="text-blue-500 hover:underline text-sm">
                                                View
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-500">No students have been added to this group yet.</p>
                            @endif
                        </div>

                        <!-- Tasks List -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-3">Tasks</h3>
                            @if($group->tasks->isNotEmpty())
                                <ul class="space-y-2">
                                    @foreach($group->tasks as $task)
                                        <li class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-3">
                                            <div class="flex justify-between items-start">
                                                <div>
                                                    <p class="font-medium text-gray-800">{{ $task->title }}</p>
                                                    <p class="text-sm text-gray-600">{{ $task->description }}</p>
                                                </div>
                                                <span class="text-xs text-gray-500">
                                                    {{ $task->created_at->format('d.m.Y H:i') }}
                                                </span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-500">Немає завдань для цієї групи.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Back Link -->
                    <a href="{{ route('courses.show', $group->course) }}"
                       class="inline-block border border-gray-300 hover:bg-gray-100 text-gray-700 font-medium px-4 py-2 rounded-md transition">
                        ← Back to Course
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
