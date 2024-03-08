<x-app-layout>
    <x-slot name="slot">
   <!-- Users -->
<div class="mb-8">
    <h3 class="text-xl font-semibold mb-4">Users</h3>

    @if ($users->count() > 0)
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Role</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->role }}</td>
                        <td class="py-2 px-4 border-b">
                            <form action="{{ route('restrictUser', ['id' => $user->id]) }}" method="post">
                                @csrf
                                <button type="submit" class="text-red-500 hover:underline focus:outline-none">Restrict</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-500">No Users found.</p>
    @endif
</div>

    </x-slot>
</x-app-layout>
