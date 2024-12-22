<x-layout>
    <div class="min-h-screen w-full flex flex-col">
        <!-- Search Bar -->
        <div class="flex justify-between w-full items-center mt-8">
            <span class="font-bold text-2xl">List of Lecturers</span>
            <form method="GET" action="{{ route('searchLecturer') }}"
                class="flex items-center border-2 rounded-xl p-1 bg-white">
                <input type="text" placeholder="Search..." class="border-none outline-none text-gray-400"
                    value="{{ $search ?? '' }}" name="search" />
                <button type="submit">
                    <img src="{{ asset('/images/search_icon.png') }}" alt="Search icon"
                        class="w-5 h-5 cursor-pointer" />
                </button>
            </form>
        </div>

        <!-- Card -->
        <div class="flex flex-col gap-y-2 mt-8">
            @forelse ($lecturers as $lecturer)
                <a href="{{ route('lecturerDetail', ['id' => $lecturer->id]) }}"
                    class="w-full flex items-center rounded-xl p-4 bg-white">
                    {{--  <a href="{{ route('lecturerDetail', ['userId' => Auth::id(), 'id' => $lecturer->id]) }}" class="w-full flex items-center rounded-xl p-4 bg-white"> --}}
                    <img src="{{ asset($lecturer->profile_image) }}" alt="User profile"
                        class="w-12 h-12 rounded-full" />
                    <div class="flex flex-col md:flex-row">
                        <span class="text-md mx-8 font-bold">{{ $lecturer->name }}</span>
                        <span class="text-sm md:text-md text-gray-400 mx-8">{{ $lecturer->email }}</span>
                    </div>
                </a>
            @empty
                <p class="text-center text-gray-500">No Lecturers found.</p>
            @endforelse
        </div>
        <div class="mt-4 ">
            {{ $lecturers->links() }}
        </div>
    </div>
</x-layout>
