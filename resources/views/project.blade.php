<x-layout>
    <div class="min-h-screen w-full flex flex-col">
        <div class="flex justify-between w-full items-center my-8">
            <span class="font-bold text-2xl">Projects</span>
        </div>
        <div class="grid grid-cols-2 gap-6">
            @foreach ($projects as $project)
                <!-- Card 1 -->
                <a href="{{ route('projectDetail', $project['project_id']) }}" class="bg-white rounded-lg shadow-lg p-4">
                    <img src="{{ asset($project->students_projects->first()->image) }}" alt="Project Photo"
                        class="w-full h-80 object-cover rounded-lg mb-2">
                    {{-- <h2 class="font-bold text-lg mb-2">{{ $project->students_projects->first()->status ?? 'No status available' }}</h2> --}}
                    <h2 class="font-bold text-lg mb-2">{{ $project->title }}</h2>
                    <div class="flex space-x-2">                        
                        <img src="{{ asset('images/user_profile.png') }}" class="rounded-full border" alt="Avatar">                        
                    </div>
                </a>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $projects->links() }}
        </div>

    </div>
</x-layout>
