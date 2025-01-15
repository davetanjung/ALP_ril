<x-layout>
    <div class="min-h-screen flex flex-col items-center justify-center px-6 pb-32">
        <!-- Title Section -->
        <h1 class="text-6xl font-extrabold text-blue-600 text-center mb-4 animate-bounce">ProjectX</h1>
        <!-- Subtitle Section -->
        <p class="text-lg text-gray-700 text-center max-w-3xl leading-7 mt-12">
            Welcome to the <span class="font-bold text-blue-600">ultimate space</span> where creativity meets opportunity! 
            <span class="italic text-gray-900">Share your projects</span> and let your ideas shine. 
            This is your chance to <span class="font-bold underline decoration-blue-400 decoration-2">present your hard work</span> 
            to a wide audience—<span class="font-semibold text-blue-600">peers</span>, 
            <span class="font-semibold text-blue-600">mentors</span>, and 
            <span class="font-semibold text-blue-600">professionals</span> who can appreciate your 
            <span class="text-indigo-600 font-bold">talent</span> and <span class="text-indigo-600 font-bold">dedication</span>.
        </p>        
    </div>
    
    <div class="min-h-screen flex flex-col">
        <!-- Main Content -->
        <div class="flex-grow flex flex-col items-center justify-center">
            <div class="flex flex-col gap-y-6 lg:grid lg:grid-cols-2 lg:gap-6 lg:py-12">
                <!-- Lecturer Box -->
                <a href="{{ route('lecturer') }}" class="relative group cursor-pointer">
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
                <a href="{{ route('student') }}" class="relative group cursor-pointer">
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
                <a href="{{ route('subject') }}" class="relative group cursor-pointer">
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
    </div>
</x-layout>
