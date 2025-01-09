<x-layout :showNavigation="false" :showFooter="false">    
    <div class="container mx-auto mt-8 px-4"> 
        <div class="max-w-2xl mx-auto bg-white rounded-lg p-8"> 
            <h1 class="text-2xl font-bold text-center mb-6">Student Registration</h1>

            @if ($errors->any())
                <div class="bg-red-500 text-white p-3 rounded mt-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('createStudent') }}" method="POST" enctype="multipart/form-data" class="mt-6">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="mt-2 p-2 w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 " required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="mt-2 border w-full border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 " required>
                </div>

                <div class="mb-4">
                    <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                    <input type="text" name="nim" id="nim" class="mt-2  w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 " required>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-full">Register Student</button>
            </form>
        </div>
    </div>
</x-layout>
