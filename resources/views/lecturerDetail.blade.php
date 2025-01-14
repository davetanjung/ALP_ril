<x-layout>
    <div class="w-full min-h-screen flex flex-col">
        <!-- Profile Section -->
        <div class="w-full flex flex-col justify-center items-center p-4">
            <img 
                src="{{ asset($lecturer->profile_image) }}" 
                alt="Lecturer Profile Picture" 
                class="w-40 h-40 rounded-full border-4 border-[#F3F4F8] shadow-md mb-4" 
            />
            <h1 class="text-3xl font-bold text-gray-800 text-center">{{ $lecturer->name }}</h1>
            <p class="text-lg text-gray-500 mt-2 text-center">{{ $lecturer->email }}</p>
        </div>

        <!-- Subjects Section -->
        <div class="w-full px-6 py-4">
            <span class="font-bold text-2xl mb-6 block">Subjects</span>

            <!-- Subjects Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($subjects as $subject)
                    <a href="{{ route('subjectDetail', $subject['id']) }}" 
                        class="relative group cursor-pointer">
                        <img 
                            src="{{ asset($subject->subject_image) }}" 
                            alt="Subject Image" 
                            class="w-full h-48 object-cover rounded-lg"
                        />
                        <div 
                            class="absolute inset-0 bg-gradient-to-t from-blue-500 to-transparent opacity-70 group-hover:opacity-90 rounded-lg">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h2 class="text-white text-2xl font-bold">{{ $subject->name }}</h2>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
