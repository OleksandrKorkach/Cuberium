<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your groups and courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-semibold text-gray-800">Your Courses</h2>
                        <a href="{{ route('courses.create') }}">
                            <x-primary-button>{{ __('Add course') }}</x-primary-button>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                        @forelse($user_courses as $course)
                            <a href="{{ route('courses.show', $course) }}"
                               class="block bg-gray-50 border border-gray-200 rounded-lg h-32 flex items-center justify-center hover:border-blue-400 transition">
                                <p class="font-medium text-gray-700">{{ $course->title }}</p>
                            </a>
                        @empty
                            <div class="col-span-full text-center text-gray-500">
                                You do not own any courses.
                            </div>
                        @endforelse
                    </div>

                    <h2 class="text-xl font-semibold text-gray-800 mt-10 mb-4">Your Groups</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                        @forelse($user_groups as $group)
                            <div class="bg-gray-50 border border-gray-200 rounded-lg h-32 flex items-center justify-center hover:border-blue-400 transition">
                                <p class="font-medium text-gray-700">{{ $group->name }}</p>
                            </div>
                        @empty
                            <div class="col-span-full text-center text-gray-500">
                                You are not in any groups.
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
