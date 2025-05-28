{{-- resources/views/groups/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Create Group for «{{ $course->title }}»
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <form method="POST"
                      action="{{ route('courses.groups.store', $course) }}">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block font-medium mb-1">Group Name</label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            required
                            class="w-full border rounded px-3 py-2"
                            placeholder="Enter group name"
                        >
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button>Save</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
