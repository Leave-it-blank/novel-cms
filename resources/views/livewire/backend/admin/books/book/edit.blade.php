<div>
    <div class="container">
        <div class="grid xl:grid-cols-2">
            <div class="p-4 xl:m-20 xl:mt-28 mx-auto">
                <img class="h-40 xl:h-auto 2xl:w-4/5" src="{{$book->getFirstMediaUrl()}}"></div>

            <div class="p-4 xl:m-20">
                <!-- content -->
                <form wire:submit.prevent="UpdateBook" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="title">
                            Title
                        </label>
                        <input
                            class="py-2 px-3 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline"
                            wire:model="title" id="title" type="text" placeholder="Title">
                        <div class="m-2 dark:text-red-300">
                            @error('title')
                            {{ $message }}
                            @enderror </div>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-state">
                            Country
                        </label>
                        <div class="relative">

                            <select name="country" wire:model="country" id="country"
                                    class="block py-3 px-4 pr-8 w-full leading-tight text-gray-700 bg-gray-200 rounded border border-gray-200 appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value=null>Select a Country</option>
                                @foreach(\App\Models\Country::getcountry() as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                            <div
                                class="flex absolute inset-y-0 right-0 items-center px-2 text-gray-700 pointer-events-none">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                            <div class="m-2 dark:text-red-300">
                                @error('country')
                                {{ $message }}
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block">
                            <input @if ($this->book->locked == true) checked @endif type="checkbox" wire:model="locked"
                                   id="locked" class="mr-2 leading-tight">
                            <span class="text-sm">
                       Locked
                          </span>
                        </label></div>
                    <div class="m-2 dark:text-red-300">
                        @error('locked')
                        {{ $message }}
                        @enderror </div>

                    <div class="mb-4">
                        <label class="block">
                            <input class="mr-2 leading-tight" @if ($this->book->mature  == true) checked
                                   @endif wire:model="mature" id="mature" type="checkbox">
                            <span class="text-sm">
                       18+
                          </span>
                        </label>
                    </div>
                    <div class="m-2 dark:text-red-300">
                        @error('mature')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block">
                            <input class="mr-2 leading-tight" @if ($this->book->hidden == true) checked
                                   @endif  wire:model="hidden" id="mature" type="checkbox">
                            <span class="text-sm">
                       Hidden
                          </span>
                        </label>
                    </div>
                    <div class="m-2 dark:text-red-300">
                        @error('hidden')
                        {{ $message }}
                        @enderror </div>

                    <div class="mb-4">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-state">
                            Novel?
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" wire:model="is_novel" value="1">
                            <span class="ml-2">Yes</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" wire:model="is_novel" value="0">
                            <span class="ml-2">No</span>
                        </label>
                    </div>
                    <div class="m-2 dark:text-red-300">
                        @error('is_novel')
                        {{ $message }}
                        @enderror </div>

                    <div class="items-center mb-4">
                        <label
                            class="flex flex-col items-center py-2 px-4 mx-auto w-64 tracking-wide uppercase bg-white rounded-lg border shadow-sm cursor-pointer dark:bg-dark text-blue border-blue hover:bg-blue hover:text-gray-700 dark:hover:text-white">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"/>
                            </svg>
                            <input type='file' class="hidden mx-auto" wire:model="thumbnail"/>
                        </label></div>
                    <div class="m-2 dark:text-red-300">
                        @error('thumbnail')
                        {{ $message }}
                        @enderror</div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700">
                            Description
                            <textarea wire:model="description"
                                      class="block py-2 px-3 mt-1 w-full leading-tight text-gray-700 rounded border shadow form-textarea focus:outline-none focus:shadow-outline"
                                      rows="5" placeholder="Description"> {{$this->description}}</textarea>
                        </label></div>
                    <div class="m-2 dark:text-red-300">
                        @error('description')
                        {{ $message }}
                        @enderror
                    </div>


                    <!--Footer-->
                    <div class="flex justify-end pt-2">
                        <x-buttons.create @click="showModal = false"
                                                             class="px-3 mx-2 text-white dark:bg-white bg-dark dark:text-black">Cancel
                        </x-buttons.create>
                        <x-buttons.create wire:submit.prevent="submit"
                                                             class="px-3 mx-2 text-white dark:bg-white bg-dark dark:text-black">Submit
                        </x-buttons.create>

                    </div>
                </form>


            </div>
            <!--/Dialog -->


        </div>


    </div>


</div>
