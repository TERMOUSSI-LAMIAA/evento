<x-app-layout>
    <x-slot name="slot">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-4">Search Results</h2>

            @forelse($events as $event)
                <div class="mb-4 p-4 border rounded shadow-md">
                    <img src="{{ asset('storage/' . $event->img) }}" alt="{{ $event->titre }}" class="mb-2 rounded-lg" width="170">
                    <h3 class="text-lg font-semibold mb-2">{{ $event->titre }}</h3>
                    <p class="text-gray-600 mb-2">Date: {{ $event->date }}</p>
                    <!-- Action buttons -->
                    <div class="flex space-x-2">
                        <a href="{{ route('details', ['id' => $event->id]) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700">View More</a>
                    </div>
                </div>
            @empty
                <p class="text-gray-600">No events found for the given title.</p>
            @endforelse
        </div>
    </x-slot>
</x-app-layout>
