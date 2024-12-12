<x-layout>
<div class="min-h-screen w-full flex flex-col">
    <!-- Search Bar -->
    <div class="flex justify-between w-full items-center mt-8">
        <span class="font-bold text-2xl">List of Students</span>
        <form action="{{ route('searchStudent') }}" method="GET" class="flex items-center border-2 rounded-xl p-1 bg-white">
            <input
            type="text"
            name="search"
            placeholder="Search students..."
            value="{{ $search ?? '' }}"
            class="border-none outline-none text-gray-400 w-full"
            />
            <button type="submit">
                <img
                src="{{ asset('/images/search_icon.png') }}"
                alt="Search icon"
                class="w-5 h-5 cursor-pointer" />
            </button>
        </form>
        </div>

    <!-- Student Cards -->
    <div class="flex flex-col gap-y-2 mt-8 student-list">
        @forelse ($students as $student)
            <div class="w-full flex items-center rounded-xl p-4 bg-white">
                <img src="{{ asset('/images/user_profile.png') }}" alt="User profile"
                    class="w-12 h-12 rounded-full" />
                <span class="text-md mx-8 font-bold">{{ $student->name }}</span>
                <span class="text-md text-gray-400 mx-8">{{ $student->email }}</span>
            </div>
        @empty
            <p class="text-center text-gray-500">No students found.</p>
        @endforelse
    </div>
</div>
</x-layout>