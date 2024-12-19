<x-layout :showNavigation="false" :showFooter="false">
    <div class="flex items-center justify-center h-screen">
        <div class="relative">
            <div class="absolute -top-16 left-1/2 transform -translate-x-1/2">
                <img src="{{ URL::asset('/images/logoo.png') }}" 
                     alt="Logo"
                     class="w-40 h-40 object-cover rounded-full shadow-lg">
            </div>
    
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-[1000px]">
                <h1 class="text-2xl font-bold text-center text-gray-800 mb-4 mt-20">Welcome</h1>
    
                <div class="space-y-4">
                    <form action="{{ route('login') }}" method="GET">
                        @csrf
                        <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                            Login
                        </button>
                    </form>                    
                
                    <!-- Register form -->
                    <form action="{{ route('register') }}" method="GET">
                        <button type="submit" class="w-full bg-blue-400 text-white py-2 px-4 rounded-lg hover:bg-blue-500 transition">
                            Register
                        </button>
                    </form>    
                
                    <form action="{{ route('home') }}" method="GET">
                        <button type="submit" class="w-full bg-white text-black py-2 px-4 border-2 rounded-lg hover:bg-gray-200 transition">
                            Continue as Guest
                        </button>
                    </form>                                          
                </div>
                
            </div>
        </div>
    </div> 
</x-layout>