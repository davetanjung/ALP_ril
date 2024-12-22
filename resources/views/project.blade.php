<x-layout>
    <div class="min-h-screen w-full flex flex-col">
        <div class="flex justify-between w-full items-center my-8">
            <span class="font-bold text-2xl">Projects</span>
        </div>
        <div class="flex flex-col gap-y-6 md:grid md:grid-cols-2 md:gap-6">
            @foreach ($projects as $project)
                <!-- Card -->
                <a href="{{ route('projectDetail', $project->project_id) }}" class="bg-white rounded-lg shadow-lg p-4">
                    <img src="{{ asset($project->students_projects->first()->image ?? 'default-image.jpg') }}" 
                         alt="Project Photo" class="w-full h-80 object-cover rounded-lg mb-2">

                    <h2 class="font-bold text-lg mb-2">{{ $project->title }}</h2>
                    <div class="flex space-x-2">  
                        @foreach ($project->students_projects as $studentsProject)
                            @foreach ($studentsProject->groupProjects as $groupProject)
                                <img src="{{ asset($groupProject->student->image) }}" 
                                     class="rounded-full border w-12 h-12" alt="Avatar">
                            @endforeach
                        @endforeach                        
                    </div>
                </a>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $projects->links() }}
        </div>
    </div>
</x-layout>
