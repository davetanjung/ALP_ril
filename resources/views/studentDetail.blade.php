<x-layout>
    <div class="w-full min-h-screen flex flex-col">
        <!-- Profile Section -->
        <div class="w-full flex flex-col justify-center items-center p-4">
            <img src="{{ asset($student->image) }}" alt="Student Profile Picture"
                class="w-40 h-40 rounded-full border-4 border-[#F3F4F8] shadow-md mb-4 object-cover" />
            <h1 class="text-3xl font-bold text-gray-800 text-center">{{ $student->name }}</h1>
            <p class="text-lg text-gray-500 mt-2 text-center">{{ $student->email }}</p>
        </div>

        <!-- Projects Section -->
        <div class="w-full px-4 flex flex-col gap-6 mt-8">
            <!-- Header with Add Button -->
            <div class="flex justify-between items-center">
                <span class="font-bold text-2xl">My Projects</span>
                @auth
                    @if (Auth::user()->id == $student->student_id)
                        <a href="{{ route('uploadProjectPage') }}" class="hover:opacity-80 flex items-center">
                            <img src="{{ asset('images/plus-icon.png') }}" alt="Add Project" class="w-6 h-6 mr-2">
                            <span class="text-blue-600 font-semibold">Add Project</span>
                        </a>
                    @endif
                @endauth
            </div>

            <!-- Empty State -->
            @if ($studentProjects->isEmpty())
                <p class="text-center text-gray-500">No projects found. Add some projects to showcase your work!</p>
            @endif

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($projects as $project)
                    <a href="{{ route('projectDetail', $project->project_id) }}"
                        class="relative group cursor-pointer">
                        @php
                            $studentProject = $studentProjects->firstWhere('project_id', $project->project_id);
                        @endphp

                        @if ($studentProject && $studentProject->image)
                            <img src="{{ asset($studentProject->image) }}" alt="Project Image"
                                class="w-full h-64 object-cover rounded-lg" />
                        @else
                            <div class="w-full h-64 bg-gray-200 flex items-center justify-center rounded-lg">
                                <span class="text-gray-500">No image available</span>
                            </div>
                        @endif

                        <div
                            class="absolute inset-0 bg-gradient-to-t from-blue-500 to-transparent opacity-70 group-hover:opacity-90 rounded-lg">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h2 class="text-white text-2xl font-bold text-center px-2">{{ $project->title }}</h2>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
