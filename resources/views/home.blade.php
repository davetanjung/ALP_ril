<x-layout>
        <div class="h-screen w-full items-center justify-center">
            <div class="flex flex-col gap-y-6 lg:grid lg:grid-cols-2 lg:gap-6 lg:py-12">
                <!-- Lecturer Box -->
                <div class="relative group">
                    <img
                        src="{{ URL::asset('/images/lecturers.png') }}"
                        alt="Lecturer"
                        class="w-full h-64 object-cover rounded-lg"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-500 to-transparent opacity-70 group-hover:opacity-90 rounded-lg"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <h2 class="text-white text-2xl font-bold">Lecturer</h2>
                    </div>
                </div>
    
                <!-- Student Box -->
                <div class="relative group">
                    <img
                        src="{{ URL::asset('/images/students.png') }}"
                        alt="Student"
                        class="w-full h-64 object-cover rounded-lg"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-500 to-transparent opacity-70 group-hover:opacity-90 rounded-lg"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <h2 class="text-white text-2xl font-bold">Student</h2>
                    </div>
                </div>
    
                <!-- Subject Box -->
                <div class="relative group">
                    <img
                       src="{{ URL::asset('/images/subjects.png') }}"
                        alt="Subject"
                        class="w-full h-64 object-cover rounded-lg"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-500 to-transparent opacity-70 group-hover:opacity-90 rounded-lg"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <h2 class="text-white text-2xl font-bold">Subject</h2>
                    </div>
                </div>
    
                <!-- Project Box -->
                <div class="relative group">
                    <img
                       src="{{ URL::asset('/images/projects.png') }}"
                        alt="Project"
                        class="w-full h-64 object-cover rounded-lg"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-500 to-transparent opacity-70 group-hover:opacity-90 rounded-lg"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <h2 class="text-white text-2xl font-bold">Project</h2>
                    </div>
                </div>
            </div>
        </div>
</x-layout>