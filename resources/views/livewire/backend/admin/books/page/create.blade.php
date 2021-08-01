<div>
    @include('partials.alerts')
    <div>
        <x-buttons.create wire:click.prevent="create_novel_page"
                                              class="px-3 mx-2 text-white dark:bg-white bg-dark dark:text-black"> Create Page</x-buttons.create>
    </div>

</div>
