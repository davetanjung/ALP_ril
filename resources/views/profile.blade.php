<x-layout>
    <div class="w-full min-h-screen ">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                Logout
            </button>
        </form>
    </div>
</x-layout>
