<x-layout>
    <div class="min-h-screen w-full flex items-center justify-center py-10">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
            <h1 class="text-2xl font-bold text-center mb-6">Add New Subject</h1>

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-4 bg-green-100 text-green-800 p-4 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Add Subject Form -->
            <form action="{{ route('storeSubject') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Subject Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Subject Name</label>
                    <input type="text" name="name" id="name" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Subject Image -->
                <div class="mb-4">
                    <label for="subject_image" class="block text-sm font-medium text-gray-700">Subject Image</label>
                    <input type="file" name="subject_image" id="subject_image" class="w-full mt-1 p-2 border rounded-lg" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg w-full hover:bg-blue-700">
                    Add Subject
                </button>
            </form>
        </div>
    </div>
</x-layout>
