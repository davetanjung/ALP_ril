<div class="w-full flex justify-between items-center mb-8">
    <div class="flex w-full items-center justify-start md:hidden">
        <a href="{{ route('home') }}" class="mr-4">
            <img src="{{ asset('/images/logoo.png') }}" alt="Logo" class="h-16 w-14">
        </a>
        @auth
            <div class="md:hidden">
                <a href="{{ route('profile', Auth::user()->id) }}">
                    <img src="{{ asset(Auth::user()->profile_image) }}" alt="User Profile"
                        class="w-16 h-16 object-cover rounded-full border-[#232360] border">
                </a>
            </div>
        @endauth
    </div>

    <a href="{{ route('home') }}" class="mr-4 hidden md:block">
        <img src="{{ asset('/images/logoo.png') }}" alt="Logo" class="h-16 w-14">
    </a>


    <nav id="menu" class="hidden md:flex md:w-full md:justify-center md:items-center">
        <a href="{{ route('home') }}"
            class="px-8 text-black transition hover:text-black/70 focus:outline-none {{ Route::currentRouteName() == 'home' ? 'text-[#232360] font-bold' : 'text-[#232360] text-opacity-[0.42]' }}">
            Home
        </a>
        <a href="{{ route('lecturer') }}"
            class="px-8 text-black transition hover:text-black/70 focus:outline-none {{ Route::currentRouteName() == 'lecturer' || Route::currentRouteName() == 'searchLecturer' || Route::currentRouteName() == 'lecturerDetail' ? 'text-[#232360] font-bold' : 'text-[#232360] text-opacity-[0.42]' }}">
            Lecturer
        </a>
        <a href="{{ route('student') }}"
            class="px-8 text-black transition hover:text-black/70 focus:outline-none   {{ Route::currentRouteName() == 'student' || Route::currentRouteName() == 'searchStudent' || Route::currentRouteName() == 'studentDetail' ? 'text-[#232360] font-bold' : 'text-[#232360] text-opacity-[0.42]' }}">
            Student
        </a>
        <a href="{{ url('/subject') }}"
            class="px-8 text-black transition hover:text-black/70 focus:outline-none {{ Route::currentRouteName() == 'subject' || Route::currentRouteName() == 'subjectDetail' ? 'text-[#232360] font-bold' : 'text-[#232360] text-opacity-[0.42]' }}">
            Subject
        </a>
        <a href="{{ url('/project') }}"
            class="px-8 text-black transition hover:text-black/70 focus:outline-none {{ Route::currentRouteName() == 'project' || Route::currentRouteName() == 'projectDetail' ? 'text-[#232360] font-bold' : 'text-[#232360] text-opacity-[0.42]' }}">
            Project
        </a>
        <a href="{{ route('credit') }}"
            class="px-8 text-black transition hover:text-black/70 focus:outline-none {{ Route::currentRouteName() == 'credit' ? 'text-[#232360] font-bold' : 'text-[#232360] text-opacity-[0.42]' }}">
            Credit
        </a>
    </nav>

    @auth
        <div class="hidden md:block ml-4 ">
            <a href="{{ route('profile', Auth::user()->id) }}">
                <img src="{{ asset(Auth::user()->profile_image) }}" alt="User Profile"
                    class="w-16 h-16 object-cover rounded-full border-[#232360] border">
            </a>
        </div>
    @endauth

    <button id="menuToggle" class="md:hidden focus:outline-none">
        <svg width="24" height="15" viewBox="0 0 24 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="24" height="3" rx="1.5" fill="black" />
            <rect y="6" width="24" height="3" rx="1.5" fill="black" />
            <rect y="12" width="24" height="3" rx="1.5" fill="black" />
        </svg>
    </button>
    @guest
        <div class="hidden md:block mt-4 flex items-center justify-center">
            <a href="{{ route('welcome') }}"
                class="px-6 py-2 text-white font-semibold bg-blue-600 rounded-full shadow-md transition transform hover:bg-blue-700 hover:-translate-y-1 focus:outline-none focus:ring focus:ring-blue-300">
                Sign In
            </a>
        </div>
    @endguest
    <div id="mobileMenu"
        class="hidden absolute z-10 top-28 left-0 w-full bg-[#F3F4F8] flex flex-col items-center justify-center py-2">
        @guest
            <a href="{{ route('welcome') }}"
                class="px-6 py-2 text-white font-semibold bg-blue-600 rounded-full shadow-md transition transform hover:bg-blue-700 hover:-translate-y-1 focus:outline-none focus:ring focus:ring-blue-300">
                Sign In
            </a>
        @endguest
        <a href="{{ route('home') }}"
            class="py-2 text-black transition hover:text-black/70 focus:outline-none {{ Route::currentRouteName() == 'home' ? 'text-[#232360] font-bold' : 'text-[#232360] text-opacity-[0.42]' }}">
            Home
        </a>
        <a href="{{ route('lecturer') }}"
            class="py-2 text-black transition hover:text-black/70 focus:outline-none {{ Route::currentRouteName() == 'lecturer' || Route::currentRouteName() == 'searchLecturer' || Route::currentRouteName() == 'lecturerDetail' ? 'text-[#232360] font-bold' : 'text-[#232360] text-opacity-[0.42]' }}">
            Lecturer
        </a>
        <a href="{{ route('student') }}"
            class="py-2 text-black transition hover:text-black/70 focus:outline-none   {{ Route::currentRouteName() == 'student' || Route::currentRouteName() == 'searchStudent' || Route::currentRouteName() == 'studentDetail' ? 'text-[#232360] font-bold' : 'text-[#232360] text-opacity-[0.42]' }}">
            Student
        </a>
        <a href="{{ url('/subject') }}"
            class="py-2 text-black transition hover:text-black/70 focus:outline-none {{ Route::currentRouteName() == 'subject' || Route::currentRouteName() == 'subjectDetail' ? 'text-[#232360] font-bold' : 'text-[#232360] text-opacity-[0.42]' }}">
            Subject
        </a>
        <a href="{{ url('/project') }}"
            class="py-2 text-black transition hover:text-black/70 focus:outline-none {{ Route::currentRouteName() == 'project' || Route::currentRouteName() == 'projectDetail' ? 'text-[#232360] font-bold' : 'text-[#232360] text-opacity-[0.42]' }}">
            Project
        </a>
        <a href="{{ route('credit') }}"
            class="py-2 text-black transition hover:text-black/70 focus:outline-none {{ Route::currentRouteName() == 'credit' ? 'text-[#232360] font-bold' : 'text-[#232360] text-opacity-[0.42]' }}">
            Credit
        </a>
    </div>
</div>
