<x-layout>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold">Add New Project</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('storeProjectUpload') }}" method="POST" enctype="multipart/form-data" class="mt-6">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Project Title</label>
                <input type="text" name="title" id="title" class="mt-2 p-2 border rounded w-full" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Project Description</label>
                <textarea name="description" id="description" rows="4" class="mt-2 p-2 border rounded w-full" placeholder="Write a brief description of your project..." required></textarea>
            </div>

            <div class="mb-4">
                <label for="assignment_type" class="block text-sm font-medium text-gray-700">Assignment Type</label>
                <select name="assignment_type" id="assignment_type" class="mt-2 p-2 border rounded w-full" required>
                    <option value="Homework">Homework</option>
                    <option value="Final Project">Final Project</option>
                    <option value="Lab Report">Lab Report</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="lecturer_subject_id" class="block text-sm font-medium text-gray-700">Subject</label>
                <select name="lecturer_subject_id" id="lecturer_subject_id" class="mt-2 p-2 border rounded w-full" required>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->lecturer_subject_id }}">
                            {{ $subject->name }} ({{ $subject->year }} - {{ $subject->semester }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Project Image</label>
                <input type="file" name="image" id="image" class="mt-2 p-2 border rounded w-full" required>
            </div>

            <div class="mb-4">
                <label for="students" class="block text-sm font-medium text-gray-700">Add Students to Group</label>
                <select name="students[]" id="students" multiple class="mt-2 p-2 border rounded w-full">
                    @foreach ($students as $student)
                        <option value="{{ $student->student_id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
                <small class="text-gray-500">Hold Ctrl (Windows) or Cmd (Mac) to select multiple students.</small>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Add Project</button>
        </form>
    </div>


    
</x-layout>