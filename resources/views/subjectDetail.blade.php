<x-layout>
    <div class="min-h-screen w-full flex flex-col px-4">
        <div class="flex justify-between items-center my-8">
            <h1 class="font-bold text-2xl">{{ $subject->name }} Projects</h1>
        </div>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('subjectProjects', ['subject' => $subject->id]) }}" class="mb-6">
            <div class="flex space-x-4">
                <div>
                    <label for="assignment_type" class="block text-sm font-medium text-gray-700">Assignment Type:</label>
                    <select name="assignment_type" id="assignment_type" class="form-select border-gray-300 rounded-lg">
                        <option value="">All</option>
                        @foreach (['AFL 1', 'AFL 2', 'AFL 3', 'ALP'] as $type)
                            <option value="{{ $type }}" {{ $selectedType == $type ? 'selected' : '' }}>
                                {{ $type }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                        Filter
                    </button>
                </div>
            </div>
        </form>

        <!-- Projects Grid -->
        <div class="grid grid-cols-2 gap-6 mb-8">
            @if ($projects->isEmpty())
                <p class="col-span-2 text-center text-gray-500">No projects available for the selected assignment type.
                </p>
            @else
                @foreach ($projects as $project)
                    <a href="{{ route('projectDetail', $project->project_id) }}"
                        class="bg-white rounded-lg shadow-lg p-4">
                        <img src="{{ asset($project->students_projects->first()->image ?? 'images/default-image.jpg') }}"
                            alt="{{ $project->title }} Project" class="w-full h-80 object-cover rounded-lg mb-4">
                        <h2 class="font-bold text-lg mb-4">{{ $project->title }}</h2>
                        <p>{{ $project->description }}</p>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
</x-layout>
