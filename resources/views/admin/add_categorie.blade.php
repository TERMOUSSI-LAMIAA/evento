<x-app-layout>
    <x-slot name="slot">
        <div class="container mx-auto">
            <form method="POST" action="{{route("addCatg")}}" enctype="multipart/form-data">
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
                    <x-primary-button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Category</x-primary-button>
                </div>
            </form>
        </div>
    </x-slot>
</x-app-layout>
