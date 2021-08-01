<div>

    <div x-data="{ 'createchaptershow': false ,'createbulkchaptershow': false }"  @created-chapter.window="createchaptershow = false"
         @created-bulk-chapter.window="createbulkchaptershow = false"
         @keydown.escape="createchaptershow = false" x-cloak>
        <div class=" flex  justify-between mt-3">

            <x-buttons.create  @click="createbulkchaptershow = true" class=" py-3  px-3 mx-2 text-white dark:bg-white bg-dark dark:text-black"> Create Bulk Chapters</x-buttons.create> </a>
            <x-buttons.create  @click="createchaptershow = true" class="px-3 py-1 rounded-md mx-2 text-white dark:bg-white bg-dark dark:text-black ">Create Chapter  </x-buttons.create>
        </div>



        <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)"
             x-show="createchaptershow" :class="{ ' absolute inset-0 z-10 flex items-center justify-center': createchaptershow }">
            <!--Dialog-->
            <div class="py-4 px-6 mx-auto w-11/12 text-left bg-white rounded shadow-lg dark:bg-darker md:max-w-md"
                 x-show="createchaptershow" @click.away="createchaptershow = false" x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" >

                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Create a Chapter </p>
                    <div class="z-50 cursor-pointer" @click="createchaptershow = false">
                        <svg class="text-black fill-current dark:text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

                <!-- content -->
                <form wire:submit.prevent="CreateChapter"  enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="number">
                            Chapter Number
                        </label>
                        <input class="py-2 px-3 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline" wire:model="number" id="number" type="text" placeholder="1">
                        <div class="dark:text-red-300 m-2">
                            @error('number')
                            {{ $message }}
                            @enderror </div>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                            Chapter Name
                        </label>
                        <input class="py-2 px-3 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline" wire:model="name" id="name" type="text" placeholder="Chapter 1">
                        <div class="dark:text-red-300 m-2">
                            @error('name')
                            {{ $message }}
                            @enderror </div>
                    </div>


                    <div class="mb-4">
                        <label class="block">
                            <input wire:model="locked" id="locked"  class="mr-2 leading-tight" type="checkbox">
                            <span class="text-sm">
                       Locked
                          </span>
                        </label> </div>
                    <div class="dark:text-red-300 m-2">
                        @error('locked')
                        {{ $message }}
                        @enderror </div>



                    <!--Footer-->
                    <div class="flex justify-end pt-2">
                        <x-buttons.create @click="createchaptershow = false" class="px-3 mx-2 text-white dark:bg-white bg-dark dark:text-black">Cancel  </x-buttons.create>
                        <x-buttons.create wire:submit.prevent="submit" class="px-3 mx-2 text-white dark:bg-white bg-dark dark:text-black">Create </x-buttons.create>

                    </div>   </form>

            </div>

        </div>



        <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)"
             x-show="createbulkchaptershow" :class="{ ' absolute inset-0 z-10 flex items-center justify-center': createbulkchaptershow }">
            <!--Dialog-->
            <div class="py-4 px-6 mx-auto w-11/12 text-left bg-white rounded shadow-lg dark:bg-darker md:max-w-md"
                 x-show="createbulkchaptershow" @click.away="createchaptershow = false" x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" >

                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Create Bulk Chapter </p>
                    <div class="z-50 cursor-pointer" @click="createbulkchaptershow = false">
                        <svg class="text-black fill-current dark:text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

                <!-- content -->
                <form wire:submit.prevent="CreateBulkChapters"  enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="chapters_number_starts">
                            Chapter Number Starts
                        </label>
                        <input class="py-2 px-3 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline" wire:model="chapters_number_starts" id="chapters_number_starts" type="text" placeholder="1">
                        <div class="dark:text-red-300 m-2">
                            @error('chapters_number_starts')
                            {{ $message }}
                            @enderror </div>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="chapters_number_ends">
                            Chapter Number Ends
                        </label>
                        <input class="py-2 px-3 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline" wire:model="chapters_number_ends" id="chapters_number_ends" type="text" placeholder="100">
                        <div class="dark:text-red-300 m-2">
                            @error('chapters_number_ends')
                            {{ $message }}
                            @enderror </div>
                    </div>


                    <div class="mb-4">
                        <label class="block">
                            <input wire:model="chapters_locked" id="chapters_locked"  class="mr-2 leading-tight" type="checkbox">
                            <span class="text-sm">
                      All chapters Locked
                          </span>
                        </label> </div>
                    <div class="dark:text-red-300 m-2">
                        @error('chapters_locked')
                        {{ $message }}
                        @enderror </div>



                    <!--Footer-->
                    <div class="flex justify-end pt-2">
                        <x-buttons.create @click="createbulkchaptershow = false" class="px-3 mx-2 text-white dark:bg-white bg-dark dark:text-black">Cancel  </x-buttons.create>
                        <x-buttons.create wire:submit.prevent="submit" class="px-3 mx-2 text-white dark:bg-white bg-dark dark:text-black">Create </x-buttons.create>

                    </div>   </form>

            </div>

        </div>
        <!--/Dialog -->
    </div><!-- /Overlay -->

</div>
