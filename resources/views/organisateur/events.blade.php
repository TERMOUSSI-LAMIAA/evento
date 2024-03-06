<x-app-layout>
    <x-slot name="slot">
        <div class="container mx-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Events</h2>
                <a href="{{route("addform")}}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add Event</a>
            </div>

            {{-- @if(session('success'))
                <div class="bg-green-200 p-3 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif --}}

            @forelse($events as $event)
                <div class="mb-4 p-4 border rounded shadow-md">
                    <h3 class="text-lg font-semibold mb-2">{{ $event->titre }}</h3>
                    <img src="{{ asset('storage/' . $event->img) }}" alt="{{ $event->titre }}" class="mb-2 rounded-lg " width="170">
                    <p class="text-gray-600 mb-2">{{ $event->description }}</p>
                    <p class="text-gray-600 mb-2">Date: {{ $event->date }}</p>
                    <p class="text-gray-600 mb-2">Location: {{ $event->lieu }}</p>
                    <p class="text-gray-600 mb-2">Seats Available: {{ $event->nbr_places }}</p>

                    <!-- Add more event details as needed -->

                    <!-- Delete form -->
                    <form action="" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                    </form>
                </div>
            @empty
                <p class="text-gray-600">No events available</p>
            @endforelse
        </div>
    </x-slot>
</x-app-layout>
