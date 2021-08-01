<x-layouts.admin_layout>

    <div class="mx-auto md:p-2  md:m-4 p-1 bg-white  dark:bg-black grid grid-rows-2">
        <div class="flex justify-end md:m-2 md:p-3 font-bold font-sans">
            @livewire('backend.management.countries.create')
        </div>
        <div class="">
            @livewire('backend.management.countries.index')
        </div>
    </div>


</x-layouts.admin_layout>
