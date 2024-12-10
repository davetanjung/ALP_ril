<x-layout>
    <div class="min-h-screen w-full flex flex-col">
        <div class="flex justify-between w-full items-center mt-8">
            <span class="font-bold text-2xl">List of Students</span>
            <div class="flex items-center border-2 rounded-xl p-1 bg-white">
                <input type="text" placeholder="Search..." class="border-none outline-none text-gray-400" value="{{ request('search') }}" name="search" />
                <img src="{{ URL::asset('/images/search_icon.png') }}" alt="Search icon" class="w-5 h-5 cursor-pointer" />
            </div>
        </div>
        {{-- Card buat person --}}
        <div class="flex flex-col gap-y-2 mt-8">
            @foreach ($allStudents as $student)
                <div class="w-full flex items-center rounded-xl p-4 bg-white">
                    <img src="{{ URL::asset('/images/user_profile.png') }}" alt="User profile"
                        class="w-12 h-12 rounded-full" />
                    <span class="text-md mx-8 font-bold">{{ $student->name }}</span>
                    <span class="text-md text-gray-400 mx-8">{{ $student->bio }}</span>
                </div>
            @endforeach
        </div>        

    </div>

</x-layout>
