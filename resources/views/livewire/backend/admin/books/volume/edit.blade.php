<div>
    <div class="container  ">
        <div class="sm:w-2/3 mx-auto md:my-40 dark:bg-darker bg-white md:p-4 rounded-md p-2">
            <form wire:submit.prevent="UpdateVolume" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="number">
                        Volume Number
                    </label>
                    <input
                        class="py-2 px-3 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline"
                        wire:model="number" id="number" type="text" placeholder="1">
                    <div class="dark:text-red-300 m-2">
                        @error('number')
                        {{ $message }}
                        @enderror </div>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                        Volume Name
                    </label>
                    <input
                        class="py-2 px-3 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline"
                        wire:model="name" id="name" type="text" placeholder="Volume 1">
                    <div class="dark:text-red-300 m-2">
                        @error('name')
                        {{ $message }}
                        @enderror </div>
                </div>


                <div class="mb-4">
                    <label class="block">
                        <input @if ($this->locked == true) checked @endif wire:model="locked" id="locked"
                               class="mr-2 leading-tight" type="checkbox">
                        <span class="text-sm">
                       Locked
                          </span>
                    </label></div>
                <div class="dark:text-red-300 m-2">
                    @error('locked')
                    {{ $message }}
                    @enderror </div>


                <!--Footer-->
                <div class="flex justify-end pt-2">
                    <a href="{{route('admin.book.show', ['book'=> $this->volume->book_id])}}"
                       class="py-2 px-3  rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:border-gray-none focus:ring-0  transition ease-in-out  mx-2 text-white dark:bg-white bg-dark dark:text-black">Go
                        Back </a>
                    <x-buttons.create wire:submit.prevent="submit"
                                      class="px-3 mx-2 text-white dark:bg-white bg-dark dark:text-black">Update
                    </x-buttons.create>

                </div>
            </form>
        </div>
    </div>
</div>
