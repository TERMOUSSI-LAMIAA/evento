<x-app-layout>
    <x-slot name="slot">
        <div class="container mx-auto">
            <form method="POST" action="{{route('storeEvent')}}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="titre" class="block text-gray-700 text-sm font-bold mb-2">Titre:</label>
                    <input type="text" name="titre" id="titre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                    <input type="datetime-local" name="date" id="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                  <div class="mb-4">
                    <label for="lieu" class="block text-gray-700 text-sm font-bold mb-2">Lieu:</label>
                    <input type="text" name="lieu" id="lieu" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="duree" class="block text-gray-700 text-sm font-bold mb-2">Durée:</label>
                    <input type="text" name="duree" id="duree" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="nbr_places" class="block text-gray-700 text-sm font-bold mb-2">Nombre de places:</label>
                    <input type="number" name="nbr_places" id="nbr_places" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="acceptation" class="block text-gray-700 text-sm font-bold mb-2">Acceptation:</label>
                    <select name="acceptation" id="acceptation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="automatique">Automatique</option>
                        <option value="manuelle">Manuelle</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="img" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                    <input type="file" name="img" id="img" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="prix" class="block text-gray-700 text-sm font-bold mb-2">Prix:</label>
                    <input type="number" name="prix" id="prix" step="0.01" min="0" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <!-- Select for Categories -->
                <div class="mb-4">
                    <label for="category" class="block text-gray-700 text-sm font-bold  mb-2">Select Category:</label>
                    <select id="category" name="category" class="bg-white border        border-gray-300 rounded px-4 py-2">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->titre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <x-primary-button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Event</x-primary-button>
                </div>
            </form>
        </div>
    </x-slot>
</x-app-layout>