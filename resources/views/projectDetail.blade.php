<x-layout>
    <div class="w-full max-w-[1200px] mx-auto py-10 px-6">
        <!-- Project Title -->
        <h1 class="text-4xl font-bold text-gray-800 mb-8">Webdev Project</h1>

        <!-- Image Section -->
        <div class="w-full mb-10">
            <img src="{{ URL::asset('/images/subjects.png') }}" 
                 alt="Code Example"
                 class="w-full h-[400px] object-cover rounded-lg shadow-lg">
        </div>

        <!-- Project Website Section -->
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Project Website Ganteng</h2>

            <!-- Profile Cards -->
            <div class="flex flex-wrap gap-8">
                <!-- Profile 1 -->
                <div class="flex items-center">
                    <img src="{{ URL::asset('/images/user_profile.png') }}" 
                         alt="Dave Tanjung"
                         class="w-16 h-16 rounded-full border-2 border-gray-300 mr-4">
                    <span class="text-gray-700 font-medium text-lg">Dave Tanjung</span>
                </div>
                <!-- Profile 2 -->
                <div class="flex items-center">
                    <img src="{{ URL::asset('/images/user_profile.png') }}" 
                         alt="Goldwin Halim"
                         class="w-16 h-16 rounded-full border-2 border-gray-300 mr-4">
                    <span class="text-gray-700 font-medium text-lg">Goldwin Halim</span>
                </div>
                <!-- Profile 3 -->
                <div class="flex items-center">
                    <img src="{{ URL::asset('/images/user_profile.png') }}" 
                         alt="Tanjung Halim"
                         class="w-16 h-16 rounded-full border-2 border-gray-300 mr-4">
                    <span class="text-gray-700 font-medium text-lg">Tanjung Halim</span>
                </div>
            </div>
        </div>
    </div>
</x-layout>