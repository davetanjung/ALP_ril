<x-layout>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold">Update your Project</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('updateProject', $project->project_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Project Title</label>
                <input type="text" name="title" id="title" class="mt-2 p-2 border rounded w-full"
                    value="{{ old('title', $project->title) }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Project Description</label>
                <textarea name="description" id="description" rows="4" class="mt-2 p-2 border rounded w-full"
                    placeholder="Write a brief description of your project..." required>{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="assignment_type" class="block text-sm font-medium text-gray-700">Assignment Type</label>
                <select name="assignment_type" id="assignment_type" class="mt-2 p-2 border rounded w-full" required>
                    <option value="AFL 1" {{ $project->assignment_type == 'AFL 1' ? 'selected' : '' }}>'AFL 1
                    </option>
                    <option value="AFL 2" {{ $project->assignment_type == 'AFL 2' ? 'selected' : '' }}>
                        AFL 2</option>
                    <option value="AFL 3" {{ $project->assignment_type == 'AFL 3' ? 'selected' : '' }}>AFL 3</option>
                    <option value="ALP" {{ $project->assignment_type == 'ALP' ? 'selected' : '' }}>ALP</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="lecturer_subject_id" class="block text-sm font-medium text-gray-700">Subject</label>
                <select name="lecturer_subject_id" id="lecturer_subject_id" class="mt-2 p-2 border rounded w-full" required>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">
                            {{ $subject->name }} 
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Project Image (.jpg .jpeg & .png)</label>
                <input type="file" name="image" id="image" class="mt-2 p-2 border rounded w-full">
                @if ($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image" class="mt-4 w-32">
                    <p class="text-gray-500">Upload a new image to replace the existing one.</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="students" class="block text-sm font-medium text-gray-700">Change the collaborators:</label>
                <div id="student-picker" class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-2">
                    @foreach ($allStudents as $student)
                    <div 
                        class="student-card p-4 border rounded-lg flex items-center space-x-4 cursor-pointer hover:bg-gray-200 active:scale-90 transition"
                        data-student-id="{{ $student->student_id }}"
                        onclick="toggleStudentSelection(this)"
                        data-selected="{{ $selectedStudents->contains('student_id', $student->student_id) ? 'true' : 'false' }}"
                    >
                        <img src="{{ asset('storage/' . $student->image) }}" alt="Profile Image" class="w-12 h-12 rounded-full">
                        <span class="text-gray-700">{{ $student->name }}</span>
                        <input type="checkbox" name="students[]" value="{{ $student->student_id }}" 
                            {{ $selectedStudents->contains('student_id', $student->student_id) ? 'checked' : '' }} 
                            class="hidden">
                    </div>
                    @endforeach
                </div>
                <small class="text-gray-500">Click on a card to select/deselect students.</small>
            </div>                   

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Update
                Project</button>
        </form>
    </div>



</x-layout>
