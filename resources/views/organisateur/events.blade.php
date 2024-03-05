
<x-app-layout>
    <x-slot name="slot">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-4">Events</h2>

            @if(session('success'))
                <div class="bg-green-200 p-3 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @foreach($events as $event)
                <div class="mb-4 p-4 border rounded">
                    <h3 class="text-lg font-semibold">{{ $event->titre }}</h3>
                    <p class="text-gray-600">{{ $event->description }}</p>
                    <p class="text-gray-600">Date: {{ $event->date }}</p>
                    <p class="text-gray-600">Location: {{ $event->lieu }}</p>
                    <p class="text-gray-600">nbr places restantes</p>

                    <!-- Add more event details as needed -->

                    <!-- Delete form -->
                    <form action="{{ route('delete.event', $event->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </x-slot>
</x-app-layout>
