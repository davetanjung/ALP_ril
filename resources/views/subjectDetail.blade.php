<x-layout>
    <div class="h-screen w-full">
        <div class="min-h-screen w-full flex flex-col">
            <div class="flex justify-between w-full items-center my-8">
                <span class="font-bold text-2xl">{{ $subject->name }} Projects</span>
            </div>
            <div class="grid grid-cols-2 gap-6">
                @if($projects->isEmpty())
                    <p>No projects available for this subject.</p>
                @else
                    @foreach ($projects as $project)
                    <div class="bg-white rounded-lg shadow-lg p-4">
                        <img src="{{ asset('/images/subjects.png') }}" alt="SS Project"
                            class="w-full h-80 object-cover rounded-lg mb-2">
                        <h2 class="font-bold text-lg mb-2">{{ $project->assignment_type }}</h2>
                        <div class="flex space-x-2">
                            <img src="https://via.placeholder.com/40" class="rounded-full border" alt="Avatar">
                            <img src="https://via.placeholder.com/40" class="rounded-full border" alt="Avatar">
                            <img src="https://via.placeholder.com/40" class="rounded-full border" alt="Avatar">
                        </div>
                    </div>
                    @endforeach    
                @endif
            </div>
        </div>
    </div>
</x-layout>
