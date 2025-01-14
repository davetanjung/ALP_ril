<x-layout>
    <div class="w-full min-h-screen flex flex-col">
        <!-- Profile Section -->
        <div class="w-full h-1/2 flex flex-col justify-center items-center p-4">
            <img src="{{ asset($student->image) }}" alt="Student Profile Picture"
                class="w-40 h-40 rounded-full border-4 border-[#F3F4F8] shadow-md mb-4" />
            <h1 class="text-3xl font-bold text-gray-800 text-center">{{ $student->name }}</h1>
            <p class="text-lg text-gray-500 mt-2 text-center">{{ $student->email }}</p>
        </div>

        <!-- Projects Section -->
        <div class="w-full px-6 py-4">
            <div class="flex justify-between items-center mb-6">
                <span class="font-bold text-2xl">My Projects</span>
                @auth
                    @if (auth()->user()->student->student_id)
                        <a href="{{ route('uploadProjectPage') }}" class="hover:opacity-80">
                            <img src="{{ asset('images/plus-icon.png') }}" alt="Add Project" class="w-6 h-6">
                        </a>
                    @endif
                @endauth
            </div>

            <!-- Project Grid -->
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
                            <h2 class="text-white text-2xl font-bold">{{ $project->title }}</h2>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
