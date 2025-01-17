<x-layout>
    <div class="min-h-screen flex flex-col items-center justify-center px-6 pb-32">
        <h1 class="text-6xl sm:text-8xl font-extrabold text-blue-600 text-center mb-4 px-2 py-4" id="title">Portolify</h1>
        <!-- Subtitle Section -->
        <p class="text-xl text-gray-700 text-center max-w-3xl leading-7 mt-12">
            Welcome to the <span id="title" class="font-bold text-blue-600">ultimate space</span> where creativity meets
            opportunity!
            <span id="title" class="italic text-gray-900">Share your projects</span> and let your ideas shine.
            This is your chance to <span class="font-bold underline decoration-blue-400 decoration-2">present your hard
                work</span>
            to a wide audience—<span id="title" class="font-semibold text-blue-600">peers</span>,
            <span id="title" class="font-semibold text-blue-600">mentors</span>, and
            <span id="title" class="font-semibold text-blue-600">professionals</span> who can appreciate your
            <span id="title" class="text-indigo-600 font-bold">talent</span> and <span id="title"
                class="text-indigo-600 font-bold">dedication</span>.
        </p>
        <a href="{{ route('project') }}" class="">
            <button
                class="text-lg bg-blue-600 text-white px-4 py-2 rounded-lg mt-12 hover:bg-blue-700 transition duration-300 active:scale-90">Get
                Started -></button>
        </a>
    </div>
    <div class="min-h-screen flex flex-col">
        <!-- Main Content -->
        <div class="flex-grow flex flex-col items-center justify-center">
            <div class="flex flex-col gap-y-6 lg:grid lg:grid-cols-2 lg:gap-6 lg:py-12">
                <!-- Lecturer Box -->
                <div class="relative group cursor-pointer" onmouseover="showPopup(event, 'See All of Our Lecturers')"
                    onmousemove="movePopup(event)" onmouseleave="hidePopup()">
                    <a href="{{ route('lecturer') }}">
                        <img src="{{ asset('/images/lecturerss.png') }}" alt="Lecturer"
                            class="w-full h-64 object-cover rounded-lg" />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-blue-500 to-transparent opacity-70 group-hover:opacity-90 rounded-lg">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h2 class="text-white text-2xl font-bold">Lecturer</h2>
                        </div>
                    </a>
                </div>

                <!-- Student Box -->
                <div class="relative group cursor-pointer" onmouseover="showPopup(event, 'See All of Our Students')"
                    onmousemove="movePopup(event)" onmouseleave="hidePopup()">
                    <a href="{{ route('student') }}">
                        <img src="{{ asset('/images/studentss.png') }}" alt="Student"
                            class="w-full h-64 object-cover rounded-lg" />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-blue-500 to-transparent opacity-70 group-hover:opacity-90 rounded-lg">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h2 class="text-white text-2xl font-bold">Student</h2>
                        </div>
                    </a>
                </div>

                <div class="relative group cursor-pointer" onmouseover="showPopup(event, 'See All of Our Subjects')"
                    onmousemove="movePopup(event)" onmouseleave="hidePopup()">
                    <a href="{{ route('subject') }}">
                        <img src="{{ asset('/images/subjectss.png') }}" alt="Subject"
                            class="w-full h-64 object-cover rounded-lg" />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-blue-500 to-transparent opacity-70 group-hover:opacity-90 rounded-lg">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h2 class="text-white text-2xl font-bold">Subject</h2>
                        </div>
                    </a>
                </div>

                <!-- Project Box -->
                <div class="relative group cursor-pointer" onmouseover="showPopup(event, 'See All of Our Projects')"
                    onmousemove="movePopup(event)" onmouseleave="hidePopup()">
                    <a href="{{ url('/project') }}">
                        <img src="{{ asset('/images/projects.png') }}" alt="Project"
                            class="w-full h-64 object-cover rounded-lg" />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-blue-500 to-transparent opacity-70 group-hover:opacity-90 rounded-lg">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h2 class="text-white text-2xl font-bold">Project</h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="popup-card"
        class="fixed bg-gradient-to-r from-blue-500 to-indigo-500 text-white text-sm font-semibold px-4 py-2 rounded-lg shadow-lg opacity-0 pointer-events-none transition-opacity duration-300">
    </div>

</x-layout>
