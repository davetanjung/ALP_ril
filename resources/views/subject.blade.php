<x-layout>
    <div class="min-h-screen w-full bg-gray-100">
        <!-- Header Section -->
        <div class="w-full my-8 px-4 md:px-8 flex items-center justify-between">
            <!-- Title -->
            <h1 class="font-bold text-3xl">Subjects</h1>
            
            <!-- Add Subject Button -->
            <a href="{{ route('addSubjectForm') }}" class="flex items-center space-x-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                <img src="{{ asset('images/plus-icon.png') }}" alt="Add Subject" class="w-6 h-6">
                <span>Add Subject</span>
            </a>
            
        </div>
        
        <!-- Subjects Grid -->
        <div class="container px-4 md:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach ($subjects as $subject)
                <a href="{{ route('subjectDetail', $subject['id']) }}" class="relative group cursor-pointer w-full">
                    <img
                        src="{{ asset($subject->subject_image) }}"
                        alt="Subject"
                        class="w-full aspect-video object-cover rounded-lg shadow-md"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-500 to-transparent opacity-70 group-hover:opacity-90 rounded-lg"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <h2 class="text-white text-2xl font-bold">{{ $subject->name }}</h2>
                    </div>
                </a>
                @endforeach                                          
            </div>          
        </div>

        <!-- Pagination -->
        <div class="mt-8 px-4 md:px-8">
            <div class="flex justify-center">
                {{ $subjects->links() }}
            </div>
        </div>
    </div>
</x-layout>
