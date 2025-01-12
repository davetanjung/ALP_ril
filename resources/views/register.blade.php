<x-layout :showNavigation="false" :showFooter="false">
    <div class="flex items-center justify-center h-auto">
        <div class="relative w-full max-w-[600px] mx-auto">
            <div class="absolute -top-16 left-1/2 transform -translate-x-1/2 z-10">
                <img src="{{ URL::asset('/images/logoo.png') }}" alt="Logo"
                    class="w-40 h-40 object-cover rounded-full shadow-lg">
            </div>

            <div class="bg-white rounded-lg p-6 pt-32 w-full min-h-screen my-auto">
                <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Register</h1>

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <!-- Email Field -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            required>
                    </div>

                    <!-- Username Field -->
                    <div class="mb-4">
                        <label for="name" value="{{ old('name') }}" class="block text-sm font-medium text-gray-700 mb-2">
                            Name
                        </label>
                        <input type="text" id="name" name="name"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            required>
                    </div>

                    <!-- Password Field -->
                    <div class="mb-6 flex space-x-4">
                        <!-- Password Field -->
                        <div class="w-1/2">
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                Password
                            </label>
                            <input type="password" id="password" name="password" 
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        </div>
                        
                        <!-- Confirm Password Field -->
                        <div class="w-1/2">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                                Confirm Password
                            </label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        </div>
                    </div>                                   

                    <!-- Role Selection -->
                    <div class="mb-6">
                        <p class="block text-sm font-medium text-gray-700 mb-2">Select Your Role</p>
                        <div class="flex justify-between">
                            <!-- Student Button -->
                            <button type="button"
                                class="role-select w-full border border-gray-300 text-black py-3 px-4 rounded-lg hover:bg-blue-500 hover:text-white active:scale-90 transition mr-2"
                                data-role="student">
                                Student
                            </button>
                            <!-- Lecturer Button -->
                            <button type="button"
                                class="role-select w-full border border-gray-300 text-black py-3 px-4 rounded-lg hover:bg-blue-500 hover:text-white active:scale-90 transition ml-2"
                                data-role="lecturer">
                                Lecturer
                            </button>
                        </div>
                        <!-- Hidden Role Input -->
                        <input type="hidden" name="role" id="role" value="">
                    </div>

                    <!-- Dynamic Student Field -->
                    <div id="student-fields" class="mb-6 hidden">
                        <label for="nim" class="block text-sm font-medium text-gray-700 mb-2">
                            NIM
                        </label>
                        <input type="text" id="nim" name="nim"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                               required>
                    </div>
                    
                    <div id="lecturer-fields" class="mb-6 hidden">
                        <label for="uniqueCode" class="block text-sm font-medium text-gray-700 mb-2">
                            Unique Code
                        </label>
                        <input type="text" id="uniqueCode" name="uniqueCode" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>                       
                    </div>
                    

                    @if ($errors->any())
                        <div class="text-red-500">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <!-- Register Button -->
                    <div>
                        <button type="submit"
                            class="w-full bg-indigo-600 text-white py-3 px-4 rounded-lg hover:bg-indigo-700 transition">
                            Register
                        </button>
                    </div>
                </form>
                <div class="text-center mt-4">
                    <span>Already have an account? </span><a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Please Log In</a>
                </div>  
            </div>
        </div>
    </div>
</x-layout>
