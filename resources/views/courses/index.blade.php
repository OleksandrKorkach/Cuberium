<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Courses') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Search form -->
            <form method="GET" action="{{ route('courses.index') }}" class="mb-6">
                <div class="flex">
                    <input
                        type="text"
                        name="search"
                        value="{{ old('search', $search) }}"
                        placeholder="Search courses..."
                        class="w-full border border-gray-300 rounded-l-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    />
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 rounded-r-md"
                    >
                        Search
                    </button>
                </div>
            </form>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    @if($courses->count())
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach($courses as $course)
                                <a href="{{ route('courses.show', $course) }}"
                                   class="block bg-gray-50 border border-gray-200 rounded-lg p-4 hover:border-blue-400 transition">
                                    <h3 class="font-semibold text-gray-800 mb-2">{{ $course->title }}</h3>
                                    @if($course->description)
                                        <p class="text-sm text-gray-600 truncate">{{ $course->description }}</p>
                                    @endif
                                </a>
                            @endforeach
                        </div>

                        <div class="mt-6">
                            {{ $courses->links() }}
                        </div>
                    @else
                        <p class="text-center text-gray-500">No courses found.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
