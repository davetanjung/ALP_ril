<x-layout>
    <div class="w-full max-w-[1200px] mx-auto py-10 px-6">
        <!-- Project Title -->
        <div class="flex flex-col md:flex-row items-center justify-between mb-10">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 text-center md:text-start">
                {{ $projects->title }}
            </h1>
            @auth
                @if ($students_project->groupProjects->pluck('student_id')->contains(Auth::user()->student_id))
                    <form action="{{ route('editProject', $projects->project_id) }}" method="GET" class="mt-4 md:mt-0">
                        @csrf
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Edit Project
                        </button>
                    </form>
                @endif
            @endauth
        </div>   
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
                @if (Auth::user()->role === 'lecturer')
                    <!-- Score Submission Form -->
                    <form action="{{ route('giveScore', $projects->project_id) }}" method="POST" class="mt-8">
                        @csrf
                        <div class="flex flex-col gap-4">
                            <label for="score" class="text-gray-700 font-medium">Give a Score:</label>
                            <input type="number" id="score" name="score" 
                                class="w-full max-w-sm p-2 border border-gray-300 rounded-lg" 
                                placeholder="Enter score here" required>
                            <button type="submit" 
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Submit Score
                            </button>
                        </div>
                    </form>
                @endif
            @endauth
        </div>
    </div>
</x-layout>
