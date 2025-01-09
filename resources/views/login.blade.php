<x-layout :showNavigation="false" :showFooter="false">
    <div class="flex items-center justify-center h-screen">
        <div class="relative w-full max-w-[600px] mx-auto">
            <!-- Dummy Image as Logo -->
            <div class="absolute -top-16 left-1/2 transform -translate-x-1/2 z-10">
                <img src="{{ URL::asset('/images/logoo.png') }}" alt="Logo"
                    class="w-40 h-40 object-cover rounded-full shadow-lg">
            </div>

            <div class="bg-white rounded-lg p-6 pt-32 w-full h-[60vh]">
                <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Login</h1>

                <form action="{{ route('login') }}" method="POST" class="mb-4">
                    @csrf
                    <!-- Email Field -->
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>
                    <input type="email" id="email" name="email"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 
                                  @error('email') border-red-500 @enderror"
                        autofocus required value="{{ old('email') }}">
                    @error('email')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Password
                        </label>
                        <input type="password" id="password" name="password" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 
                                      @error('password') border-red-500 @enderror">
                        @error('password')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Login Button -->
                    <div>
                        <button type="submit"
                            class="w-full bg-indigo-600 text-white py-3 px-4 rounded-lg hover:bg-indigo-700 transition">
                            Login
                        </button>
                    </div>

                </form>

                <!-- Password Field -->

            </div>
        </div>
    </div>
</x-layout>
