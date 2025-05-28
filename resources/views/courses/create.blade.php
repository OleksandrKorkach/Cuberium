<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('courses.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 font-medium mb-1">
                                Course Title
                            </label>
                            <input
                                id="title"
                                name="title"
                                type="text"
                                required
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200"
                                placeholder="Enter course title"
                            >
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-medium mb-1">
                                Description
                            </label>
                            <textarea
                                id="description"
                                name="description"
                                rows="4"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200"
                                placeholder="Brief description of the course"
                            ></textarea>
                        </div>

                        <div class="flex justify-end">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
