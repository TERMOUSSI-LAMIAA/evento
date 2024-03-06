<x-app-layout>
    <x-slot name="slot">
        <div class="container mx-auto">
            <form method="POST" action="{{route("updtEvent")}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" name="id" value="{{$event->id}}" hidden>
                <div class="mb-4">
                    <label for="titre" class="block text-gray-700 text-sm font-bold mb-2">Titre:</label>
                    <input type="text" name="titre" id="titre" value="{{ $event->titre }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $event->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                    <input type="datetime-local"  value="{{ $event->date }}" name="date" id="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                  <div class="mb-4">
                    <label for="lieu" class="block text-gray-700 text-sm font-bold mb-2">Lieu:</label>
                    <input type="text"  value="{{ $event->lieu }}" name="lieu" id="lieu" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="duree" class="block text-gray-700 text-sm font-bold mb-2">Durée:</label>
                    <input type="text" name="duree"  value="{{ $event->duree }}" id="duree" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="nbr_places" class="block text-gray-700 text-sm font-bold mb-2">Nombre de places:</label>
                    <input type="number" name="nbr_places"  value="{{ $event->nbr_places }}" id="nbr_places" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="acceptation" class="block text-gray-700 text-sm font-bold mb-2">Acceptation:</label>
                    <select name="acceptation" id="acceptation"  value="{{ $event->acceptation }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="automatique">Automatique</option>
                        <option value="manuelle">Manuelle</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="img" class="block text-gray-700 text-sm font-bold mb-2">current Image:</label>
                   <img src="{{ asset('storage/' . $event->img) }}" alt="{{ $event->titre }}" class="mb-2 rounded-lg " width="170">
                </div>
                <div class="mb-4">
                    <label for="img" class="block text-gray-700 text-sm font-bold mb-2">New Image:</label>
                    <input type="file" name="img" id="img" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>


                <div class="mb-4">
                    <label for="prix" class="block text-gray-700 text-sm font-bold mb-2">Prix:</label>
                    <input type="number" name="prix" id="prix" step="0.01" min="0" value="{{ $event->prix }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <!-- Select for Categories -->
                <div class="mb-4">
                    <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Select Category:</label>
                    <select id="category" name="category" class="bg-white border border-gray-300 rounded px-4 py-2">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $event->categorie_id == $category->id ? 'selected' : '' }}>{{ $category->titre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <x-primary-button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Update Event</x-primary-button>
                </div>
            </form>
        </div>
    </x-slot>
</x-app-layout>
