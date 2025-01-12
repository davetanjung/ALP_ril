<x-layout>
    <div class="w-full h-screen flex flex-col">
        <div class="w-full h-1/2 flex flex-col justify-center items-center">
            <img src="{{ asset($student->image) }}" alt="Student Profile Picture"
                class="w-40 h-40 rounded-full border-4 border-[#F3F4F8] shadow-md mb-4" />
            <h1 class="text-3xl font-bold text-gray-800">{{ $student->name }}</h1>
            <p class="text-lg text-gray-500 mt-2">{{ $student->email }}</p>
        </div>

        <div class="w-full h-1/2 px-4 flex flex-wrap justify-start overflow-x-scroll gap-6 mt-8">
            <div class="flex">
                <span class="font-bold text-2xl mb-8 w-full">My Projects</span>
                @auth
                    @if (auth()->user()->student->student_id)
                        <a href="{{ route('uploadProjectPage') }}" class="hover:opacity-80">
                            <img src="{{ asset('images/plus-icon.png') }}" alt="Add Project" class="w-6 h-6">
                        </a>
                    @endif
                @endauth
            </div>
            @foreach ($projects as $project)
                <a href="{{ route('projectDetail', $project->project_id) }}"
                    class="relative group cursor-pointer w-1/4">
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
</x-layout>
