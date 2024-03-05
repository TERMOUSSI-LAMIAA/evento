<x-app-layout>
    <x-slot name="slot">
        <div class="container mx-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Categories</h2>
                <a href="{{route("addCatgForm")}}" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-bold rounded-lg shadow-md hover:bg-blue-700">Add Category</a>
            </div>
            @foreach($catgs as $category)
                <div class="mb-4 p-4 border rounded">
                    <h3 class="text-lg font-semibold">{{ $category->titre }}</h3>
                    <p class="text-gray-600">{{ $category->description }}</p>

                    <form action="" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </x-slot>
</x-app-layout>
