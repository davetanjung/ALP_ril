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

        <form action="{{ route('updateProject', $project->id) }}" method="POST" enctype="multipart/form-data"
            class="mt-6">
            @csrf
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
                    <option value="Homework" {{ $project->assignment_type == 'Homework' ? 'selected' : '' }}>Homework
                    </option>
                    <option value="Final Project" {{ $project->assignment_type == 'Final Project' ? 'selected' : '' }}>
                        Final Project</option>
                    <option value="Lab Report" {{ $project->assignment_type == 'Lab Report' ? 'selected' : '' }}>Lab
                        Report</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="lecturer_subject_id" class="block text-sm font-medium text-gray-700">Subject</label>
                <select name="lecturer_subject_id" id="lecturer_subject_id" class="mt-2 p-2 border rounded w-full"
                    required>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->lecturer_subject_id }}"
                            {{ $project->lecturer_subject_id == $subject->lecturer_subject_id ? 'selected' : '' }}>
                            {{ $subject->name }} ({{ $subject->year }} - {{ $subject->semester }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Project Image</label>
                <input type="file" name="image" id="image" class="mt-2 p-2 border rounded w-full">
                @if ($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image" class="mt-4 w-32">
                    <p class="text-gray-500">Upload a new image to replace the existing one.</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="students" class="block text-sm font-medium text-gray-700">Add Students to Group</label>
                <select name="students[]" id="students" multiple class="mt-2 p-2 border rounded w-full">
                    @foreach ($students as $student)
                        <option value="{{ $student->student_id }}"
                            {{ in_array($student->student_id, $project->students->pluck('student_id')->toArray()) ? 'selected' : '' }}>
                            {{ $student->name }}
                        </option>
                    @endforeach
                </select>
                <small class="text-gray-500">Hold Ctrl (Windows) or Cmd (Mac) to select multiple students.</small>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Add
                Project</button>
        </form>
    </div>



</x-layout>
