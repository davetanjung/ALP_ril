<x-layout>
    <div class="w-full min-h-screen flex flex-col items-center py-10 bg-gray-100">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Profile</h1>

        <!-- User Profile Card -->
        <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
            <!-- Profile Image -->
            <div class="flex flex-col items-center">
                <img 
                    src="{{ asset(Auth::user()->profile_image) }}" 
                    alt="Profile Image" 
                    class="w-32 h-32 object-cover rounded-full mb-6 border border-gray-300">
                
                <!-- Profile Image Update Form -->
                <form action="{{ route('updateProfileImage') }}" method="POST" enctype="multipart/form-data" class="w-full">
                    @csrf
                    <label for="profile_image" class="block text-sm font-medium text-gray-700 mb-2">
                        Upload New Profile Image
                    </label>
                    <input 
                        type="file" 
                        name="profile_image" 
                        id="profile_image" 
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <button type="submit" class="mt-4 w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Update Image
                    </button>
                </form>
            </div>

            <!-- User Information -->
            <div class="mt-8 space-y-4">
                <p class="text-lg text-gray-800"><strong>Name:</strong> {{ Auth::user()->name }}</p>
                <p class="text-lg text-gray-800"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p class="text-lg text-gray-800"><strong>Role:</strong> {{ Auth::user()->role }}</p>
            </div>
        </div>

        <!-- Logout Button -->
        <div class="mt-8">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">
                    Logout
                </button>
            </form>
        </div>
    </div>
</x-layout>
