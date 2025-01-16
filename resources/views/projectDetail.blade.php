<x-layout>
    <div class="w-full max-w-[1200px] mx-auto py-10 px-6">
        <!-- Project Title -->
        <h1 class="text-4xl font-bold text-center md:text-start text-gray-800 mb-8">{{ $projects->title }}</h1>

        <!-- Image Section -->
        <div class="w-full mb-10">
            <img src="{{ asset($students_project->image) }}" alt="Code Example"
                class="w-full h-[400px] object-cover rounded-lg shadow-lg">
        </div>

        <!-- Project Website Section -->
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ $projects->description }}</h2>
            {{-- Profile Cards --}}
            <div class="flex flex-wrap gap-8">
                @foreach ($students as $student)
                    <!-- Profile -->
                    <a href="{{ route('studentDetail', $student->student_id) }}" class="flex items-center">
                        <img src="{{ asset($student->image) }}" alt="Student Image"
                            class="w-16 h-16 rounded-full border-2 border-gray-300 mr-4">
                        <span class="text-gray-700 font-medium text-lg">{{ $student->name }}</span>
                    </a>
                @endforeach
            </div>
            @auth
                @if ($students_project->groupProjects->pluck('student_id')->contains(Auth::user()->student_id))
                    <form action="{{ route('editProject', $projects->project_id) }}" method="GET">
                        @csrf
                        <div class="mt-8">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Edit Project
                            </button>
                        </div>
                    </form>
                @endif
            @endauth
        </div>
    </div>
</x-layout>
