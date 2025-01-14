<x-layout>
    <div class="w-full min-h-screen flex flex-col items-center py-10">
        <h1 class="text-3xl font-bold mb-8">Profile</h1>

        <!-- User Profile Card -->
        <div class="bg-white rounded-lg shadow-lg p-12 w-186">
            <!-- Profile Image -->
            <div class="flex flex-col items-center">
                <img 
                    src="{{ asset(Auth::user()->profile_image) }}" 
                    alt="Profile Image" 
                    class="w-32 h-32 object-cover rounded-full mb-4">
                
                    <form action="{{ route('updateProfileImage') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="profile_image" class="text-sm font-medium text-gray-700 mb-2">Upload New Profile Image</label>
                        <input 
                            type="file" 
                            name="profile_image" 
                            id="profile_image" 
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                        <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Update Image
                        </button>
                    </form>
                    
            </div>

            <!-- User Information -->
            <div class="mt-6">
                <p class="text-lg"><strong>Name:</strong> {{ Auth::user()->name }}</p>
                <p class="text-lg"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p class="text-lg"><strong>Role:</strong> {{ Auth::user()->role }}</p>
            </div>
        </div>

        <div class="mt-6">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                Logout
            </button>
        </form>
    </div>
    
    </div>
</x-layout>
