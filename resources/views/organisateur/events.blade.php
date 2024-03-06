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

                    <!-- Action buttons -->
                    <div class="flex space-x-2">
                        <!-- Update button -->
                        <a href="{{route('updtFormEvent',['id' => $event->id])}}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700">Update</a>

                        <!-- Delete form -->
                       <form action="{{route('deleteEvent',['id'=> $event->id])}}"   method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-600">No events available</p>
            @endforelse
        </div>
    </x-slot>
</x-app-layout>
