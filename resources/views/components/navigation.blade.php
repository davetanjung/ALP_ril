    <div class="w-full flex justify-center items-center">
        <a href="{{ route('home') }}"><img src="{{ URL::asset('/images/logoo.png') }}" alt="Logo" class=""></a>
        <nav class="w-full justify-center flex">
            <a href="{{ url('/') }}" class="px-8  text-black transition hover:text-black/70 focus:outline-none {{ Route::currentRouteName() == 'home' ? 'text-[#232360] font-bold': 'text-[#232360] text-opacity-[0.42]' }}">
                Home
            </a>
            <a href="{{ url('/lecturer') }}" class="px-8  text-black transition hover:text-black/70 focus:outline-none {{ Route::currentRouteName() == 'lecturer' ? 'text-[#232360] font-bold': 'text-[#232360] text-opacity-[0.42]' }}">
                Lecturer
            </a>
            <a href="{{ url('/student') }}" class="px-8  text-black transition hover:text-black/70 focus:outline-none {{ Route::currentRouteName() == 'student' ? 'text-[#232360] font-bold': 'text-[#232360] text-opacity-[0.42]' }}">
                Student
            </a>
            <a href="{{ url('/subject') }}" class="px-8  text-black transition hover:text-black/70 focus:outline-none {{ Route::currentRouteName() == 'subject' ? 'text-[#232360] font-bold': 'text-[#232360] text-opacity-[0.42]' }}">
                Subject
            </a>
            <a href="{{ url('/project') }}" class="px-8  text-black transition hover:text-black/70 focus:outline-none {{ Route::currentRouteName() == 'project' ? 'text-[#232360] font-bold': 'text-[#232360] text-opacity-[0.42]' }}">
                Project
            </a>
        </nav>
        <div class="flex items-center">
            <img src="{{ URL::asset('/images/user_profile.png') }}" alt="User Profile"
                class="rounded-full border-2 border-[#AA98CA]">
        </div>
    </div>
