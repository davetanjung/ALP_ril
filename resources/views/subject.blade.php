<x-layout>
    <div class="min-h-screen w-full">
        <div class="min-h-screen w-full flex flex-col justify-between">
            <div class="flex justify-between w-full items-center my-8">
                <span class="font-bold text-2xl">Subjects</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($subjects as $subject)
                <!-- Card -->
                <a href="{{ route('subjectDetail', $subject['id']) }}" class="relative group cursor-pointer">
                    <img
                        src="{{ asset($subject->subject_image) }}"
                        alt="Lecturer"
                        class="w-full h-64 object-cover rounded-lg"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-500 to-transparent opacity-70 group-hover:opacity-90 rounded-lg"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <h2 class="text-white text-2xl font-bold">{{ $subject->name }}</h2>
                    </div>
                </a>
                @endforeach                                          
            </div>          
            <div class="mt-4">                
                <div>
                    {{ $subjects->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
