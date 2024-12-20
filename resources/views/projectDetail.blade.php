<x-layout>
    <div class="w-full max-w-[1200px] mx-auto py-10 px-6">
        <!-- Project Title -->
        <h1 class="text-4xl font-bold text-gray-800 mb-8">{{ $projects->title }}</h1>

        <!-- Image Section -->
        <div class="w-full mb-10">
            <img src="{{ asset($students_project->image) }}" 
                 alt="Code Example"
                 class="w-full h-[400px] object-cover rounded-lg shadow-lg">
        </div>

        <!-- Project Website Section -->
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ $projects->description }}</h2>
           
            {{--  Profile Cards  --}}
            <div class="flex flex-wrap gap-8">
                @foreach($students as $student)
                <!-- Profile 1 -->
                <a href="{{ route('studentDetail', $student->student_id) }}" class="flex items-center">
                    <img src="{{ asset($student->image) }}" 
                         alt="Dave Tanjung"
                         class="w-16 h-16 rounded-full border-2 border-gray-300 mr-4">
                    <span class="text-gray-700 font-medium text-lg">{{ $student->name }}</span>
                </a>             
                @endforeach
            </div>

        
        </div>
    </div>
</x-layout>