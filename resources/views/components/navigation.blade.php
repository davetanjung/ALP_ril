<div class="w-full flex justify-between items-center mb-8">
    <a href="{{ route('home') }}">
        <img src="{{ asset('/images/logoo.png') }}" alt="Logo" class="h-14 w-12">
    </a>
    <button id="menuToggle" class="md:hidden focus:outline-none">
        <svg width="24" height="15" viewBox="0 0 24 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="24" height="3" rx="1.5" fill="black" />
            <rect y="6" width="24" height="3" rx="1.5" fill="black" />
            <rect y="12" width="24" height="3" rx="1.5" fill="black" />
        </svg>

    </button>
    <nav id="menu" class="hidden md:flex md:w-full md:justify-center">
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
    </nav>
    @auth        
        <div>
            <a href="{{ route('profile', Auth::user()->id) }}">
                <img src="{{ asset(Auth::user()->profile_image) }}" alt="User Profile"
                class="rounded-full border-2 border-[#AA98CA] w-16 h-16">
            </a>            
        </div>
    @endauth
    @guest
        <!-- Guest user will see this -->
        <a href="{{ route('login') }}"
            class="border-2 px-8 py-1 text-black transition hover:text-black/70 focus:outline-none rounded-full">Login</a>
        <a href="{{ route('register') }}"
            class="ml-2 border-2 px-8 py-1 text-black transition hover:text-black/70 focus:outline-none rounded-full">Register</a>
    @endguest
    <div id="mobileMenu"
        class="hidden absolute z-10 top-28 left-0 w-full bg-[#F3F4F8] flex flex-col items-center justify-center py-2">
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
    </div>
</div>
