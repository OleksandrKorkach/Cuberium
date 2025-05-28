<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Info about course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Course Title -->
                    <h1 class="text-2xl font-bold text-gray-800 mb-4">
                        {{ $course->title }}
                    </h1>

                    <!-- Course Description -->
                    @if($course->description)
                        <p class="mb-6 text-gray-700 whitespace-pre-line">
                            {{ $course->description }}
                        </p>
                    @endif

                    <!-- Metadata -->
                    <div class="text-sm text-gray-500 mb-6">
                        Created on {{ $course->created_at->format('F j, Y') }}
                        @if($course->updated_at->gt($course->created_at))
                            • Updated on {{ $course->updated_at->format('F j, Y') }}
                        @endif
                    </div>

                    <!-- Course’s Groups -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-3">
                            <h2 class="text-xl font-semibold text-gray-800">Groups</h2>

                            @if(Auth::id() === $course->owner_id)
                                <a href="{{ route('courses.groups.create', $course) }}"
                                   class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-medium px-3 py-1 rounded-md transition">
                                    {{ __('Add Group') }}
                                </a>
                            @endif
                        </div>

                        @if($course->groups->count())
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach($course->groups as $group)
                                    <a href="{{ route('groups.show', $group) }}"
                                       class="block bg-gray-50 border border-gray-200 rounded-lg p-4 hover:border-blue-400 transition">
                                        <p class="font-medium text-gray-700">{{ $group->name }}</p>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500">No groups have been created for this course yet.</p>
                        @endif
                    </div>

                    <!-- Actions -->
                    <div class="flex space-x-3">
                        <a href="{{ route('courses.edit', $course) }}"
                           class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-md transition">
                            Edit
                        </a>

                        <form action="{{ route('courses.destroy', $course) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this course?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-block bg-red-500 hover:bg-red-600 text-white font-medium px-4 py-2 rounded-md transition">
                                Delete
                            </button>
                        </form>

                        <a href="{{ route('courses.index') }}"
                           class="inline-block border border-gray-300 hover:bg-gray-100 text-gray-700 font-medium px-4 py-2 rounded-md transition">
                            Back to All Courses
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
