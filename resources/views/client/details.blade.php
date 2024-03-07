<x-app-layout>
    <x-slot name="slot">
        <div class="container mx-auto">
            <div class="mb-4 p-4 border rounded shadow-md">
                <img src="{{ asset('storage/' . $event->img) }}" alt="{{ $event->titre }}" class="mb-2 rounded-lg" width="170">
                <h3 class="text-lg font-semibold mb-2">Titre:{{ $event->titre }}</h3>
                <p class="text-gray-600 mb-2">Date: {{ $event->date }}</p>
                <p class="text-gray-700">Description:{{ $event->description }}</p>
                <p class="text-gray-700">Lieu:{{ $event->lieu }}</p>
                <p class="text-gray-700">Duree:{{ $event->duree }}</p>
                <p class="text-gray-700">Nombre places:{{ $event->nbr_places }}</p>

                  <!-- Reserve button -->
                <form action="{{ route('reserveEvent', ['id' => $event->id]) }}" method="post">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Reserve</button>
                </form>

                <div class="mt-4">
                    <a href="{{ route('getAllEvent') }}" class="text-blue-500 hover:underline">Back to Events</a>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
