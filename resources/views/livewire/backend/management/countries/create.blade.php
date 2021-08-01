<div>

    <div x-data="{ 'showModal': false }" @created-country.window="showModal = false" @keydown.escape="showModal = false"
         x-cloak>
        <div class="flex justify-end">
            <x-buttons.create @click="showModal = true"
                              class="py-1 px-3 mx-2 text-white rounded-md dark:bg-white bg-dark dark:text-black">Create
                Country Tag
            </x-buttons.create>
        </div>


        <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)"
             x-show="showModal" :class="{ ' absolute inset-0 z-10 flex items-center justify-center': showModal }">
            <!--Dialog-->
            <div class="py-4 px-6 mx-auto w-11/12 text-left bg-white rounded shadow-lg dark:bg-darker md:max-w-md"
                 x-show="showModal" @click.away="showModal = false" x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Create a Country Tag </p>
                    <div class="z-50 cursor-pointer" @click="showModal = false">
                        <svg class="text-black fill-current dark:text-white" xmlns="http://www.w3.org/2000/svg"
                             width="18" height="18" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

                <!-- content -->
                <form wire:submit.prevent="Create_Country" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                            Country Name
                        </label>
                        <input
                            class="py-2 px-3 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline"
                            wire:model="name" id="name" type="text" placeholder="South Korea">
                        <div class="m-2 dark:text-red-300">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                            Country Code
                        </label>
                        <input
                            class="py-2 px-3 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline"
                            wire:model="code" id="code" type="text" placeholder="91">
                        <div class="m-2 dark:text-red-300">
                            @error('code')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <!--Footer-->
                    <div class="flex justify-end pt-2">

                        <x-buttons.create @click="showModal = false"
                                          class="px-3 mx-2 text-white dark:bg-white bg-dark dark:text-black">Cancel
                        </x-buttons.create>
                        <x-buttons.create wire:submit.prevent="submit"
                                          class="px-3 mx-2 text-white dark:bg-white bg-dark dark:text-black">
                            Create
                        </x-buttons.create>

                    </div>
                </form>

            </div>
        </div>
        <!--/Dialog -->
    </div><!-- /Overlay -->
</div>

