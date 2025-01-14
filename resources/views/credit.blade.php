<x-layout>
    <div class="w-full py-16 flex flex-col items-center overflow-auto">
        <h1 class="text-4xl font-bold text-center mb-12">Credits</h1>

        <!-- Your and Your Friend's Section -->
        <div class="flex flex-col md:flex-row md:justify-center md:space-x-16 space-y-8 md:space-y-0">
            <!-- Your Profile -->
            <div class="text-center bg-white p-6 rounded-lg shadow-lg w-72">
                <img src="{{ asset('images/goldwin.jpg') }}" alt="Your Image" class="w-64 h-64 object-cover rounded-md mx-auto">
                <p class="mt-4 text-2xl font-semibold">Goldwin Halim</p>
            </div>

            <!-- Friend's Profile -->
            <div class="text-center bg-white p-6 rounded-lg shadow-lg w-72">
                <img src="{{ asset('images/dave.jpg') }}" alt="Friend Image" class="w-64 h-64 object-cover rounded-md mx-auto">
                <p class="mt-4 text-2xl font-semibold">Dave Gideon Tanjung Wirjoatmodjo</p>
            </div>
        </div>

        <!-- Lecturer Section -->
        <div class="mt-16 text-center bg-white p-8 rounded-lg shadow-lg w-5/6 md:w-1/3">
            <h2 class="text-3xl font-bold mb-8">Lecturer</h2>
            <img src="{{ asset('images/Laura-Tjahjono.jpg') }}" alt="Lecturer Image" class="w-64 h-64 object-cover rounded-md mx-auto">
            <p class="mt-4 text-2xl font-semibold">Dipl.-Inf. Laura Mahendratta Tjahjono</p>
        </div>
    </div>
</x-layout>
