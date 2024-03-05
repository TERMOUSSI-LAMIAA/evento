<x-app-layout>
    
   
    @role("organisateur")
    <x-slot name="slot">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in organisateur!") }}
                </div>
            </div>
        </div>
    </div>
       
    </x-slot>
    @endrole
    @role("client")
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in client!") }}
                </div>
            </div>
        </div>
    </div>
    @endrole
    @role("admin")
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in admin!") }}
                </div>
            </div>
        </div>
    </div>
    @endrole
</x-app-layout>
