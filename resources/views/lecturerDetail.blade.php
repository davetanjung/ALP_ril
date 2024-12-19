<x-layout>
    <div class="w-full h-screen flex flex-col">
        <div class="w-full h-1/2 flex flex-col justify-center items-center">
            <img 
            src="{{ asset($lecturer->profile_image) }}" 
            alt="Student Profile Picture" 
            class="w-40 h-40 rounded-full border-4 border-[#F3F4F8] shadow-md mb-4" 
        />            
        <h1 class="text-3xl font-bold text-gray-800">{{ $lecturer->name }}</h1>
        <p class="text-lg text-gray-500 mt-2">{{ $lecturer->email }}</p>
        </div>
        <div class="w-96 h-1/2 flex flex-col">
            <span class="font-bold text-2xl mb-8">Subjects</span>
            @foreach ($subjects as $subject)
            <a href="{{ route('subjectDetail', $subject['id']) }}" class="relative group cursor-pointer">               
                <img                
                    src="{{ asset($subject->subject_image) }}"
                    alt="Projects"
                    class="w-full h-64 object-cover rounded-lg"
                />               
                <div class="absolute inset-0 bg-gradient-to-t from-blue-500 to-transparent opacity-70 group-hover:opacity-90 rounded-lg"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    
                    <h2 class="text-white text-2xl font-bold">{{ $subject->name }}</h2>
                </div>
            </a>  
            @endforeach        
        </div>
    </div>
</x-layout>
