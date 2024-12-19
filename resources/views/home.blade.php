<x-layout>
        <div class="h-screen w-full items-center justify-center">
            <div class="flex flex-col gap-y-6 lg:grid lg:grid-cols-2 lg:gap-6 lg:py-12">
                <!-- Lecturer Box -->
                <a href="{{ route('lecturer') }}" class="relative group cursor-pointer">
                    {{-- <a href="{{ route('lecturer', ['userId' => Auth::id()]) }}" class="relative group cursor-pointer"> --}}
                    <img
                        src="{{ asset('/images/lecturers.png') }}"
                        alt="Lecturer"
                        class="w-full h-64 object-cover rounded-lg"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-500 to-transparent opacity-70 group-hover:opacity-90 rounded-lg"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <h2 class="text-white text-2xl font-bold">Lecturer</h2>
                    </div>
                </a>
    
                <!-- Student Box -->
                <a href='{{ route('student') }}' class="relative group cursor-pointer">
                    <img
                        src="{{ asset('/images/students.png') }}"
                        alt="Student"
                        class="w-full h-64 object-cover rounded-lg"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-500 to-transparent opacity-70 group-hover:opacity-90 rounded-lg"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <h2 class="text-white text-2xl font-bold">Student</h2>
                    </div>
                </a>
    
                <!-- Subject Box -->
                <a href='{{ route('subject') }}'  class="relative group cursor-pointer">
                    <img
                       src="{{ asset('/images/subjects.png') }}"
                        alt="Subject"
                        class="w-full h-64 object-cover rounded-lg"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-500 to-transparent opacity-70 group-hover:opacity-90 rounded-lg"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <h2 class="text-white text-2xl font-bold">Subject</h2>
                    </div>
                </a>
    
                <!-- Project Box -->
                <a href="{{ url('/project') }}" class="relative group cursor-pointer">
                    <img
                       src="{{ asset('/images/projects.png') }}"
                        alt="Project"
                        class="w-full h-64 object-cover rounded-lg"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-500 to-transparent opacity-70 group-hover:opacity-90 rounded-lg"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <h2 class="text-white text-2xl font-bold">Project</h2>
                    </div>
                </a>
            </div>
        </div>
</x-layout>