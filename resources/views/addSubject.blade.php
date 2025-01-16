<x-layout>
    <div class="min-h-screen w-full flex items-center justify-center py-10">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
            <h1 class="text-2xl font-bold text-center mb-6">Add New Subject</h1>

            <form action="{{ route('storeSubject') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Subject Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium">Subject Name</label>
                    <input type="text" name="name" id="name" required class="w-full border rounded-lg p-2">
                </div>

                <!-- Subject Image -->
                <div class="mb-4">
                    <label for="subject_image" class="block text-sm font-medium">Subject Image</label>
                    <input type="file" name="subject_image" id="subject_image" required class="w-full border rounded-lg">
                </div>

                <!-- Year -->
                <div class="mb-4">
                    <label for="year" class="block text-sm font-medium">Year</label>
                    <input type="number" name="year" id="year" required class="w-full border rounded-lg p-2">
                </div>

                <!-- Semester -->
                <div class="mb-4">
                    <label for="semester" class="block text-sm font-medium">Semester</label>
                    <select name="semester" id="semester" required class="w-full border rounded-lg p-2">
                        <option value="Spring">Odd</option>
                        <option value="Summer">Event</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="bg-blue-600 text-white rounded-lg p-2 w-full">Add Subject</button>
            </form>
        </div>
    </div>
</x-layout>
