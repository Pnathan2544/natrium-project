<x-app-layout>

    {{--
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>   --}}  

    <ul class="flex flex-wrap text-sm font-medium text-center text-body">
    <li class="me-2">
        <a href="#" class="inline-block px-4 py-2.5 text-white bg-brand rounded-base active" aria-current="page">Tab 1</a>
    </li>
    <li class="me-2">
        <a href="#"  class="inline-block px-4 py-3 rounded-base hover:text-heading hover:bg-neutral-secondary-soft">Tab 2</a>
    </li>
    <li class="me-2">
        <a href="#" class="inline-block px-4 py-3 rounded-base hover:text-heading hover:bg-neutral-secondary-soft">Tab 3</a>
    </li>
    <li class="me-2">
        <a href="#" class="inline-block px-4 py-3 rounded-base hover:text-heading hover:bg-neutral-secondary-soft">Tab 4</a>
    </li>
    <li>
        <a class="inline-block px-4 py-3 text-fg-disabled cursor-not-allowed">Tab 5</a>
    </li>
    </ul>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
