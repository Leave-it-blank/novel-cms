<x-layouts.admin_layout>
    <div class="container p-1 md:p-5 ">
        @include('partials.alerts')
        <div class="flex justify-between  place-items-center ">

            <div class="py-1 px-6 rounded-md">
                <div class=" font-bold  text-md sm:text-2xl"> {{'Chapter '.$chapter->number}}
                </div>
                <div class="text-sm pt-3">
                    {{$chapter->name}}
                </div>
            </div>
            <div><a href="{{route('admin.volume.show', ['book' => $book, 'volume'=>$volume])}}">
                    <x-buttons.create
                        class="  px-3 mx-2 text-white dark:bg-white bg-dark dark:text-black">View Volume
                    </x-buttons.create>
                </a>
                <a href="{{route('admin.book.show', ['book' => $book])}}">
                    <x-buttons.create
                        class="  px-3 mx-2 text-white dark:bg-white bg-dark dark:text-black">View Book
                    </x-buttons.create>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-6">

            <div class="xl:col-span-2 mt-8 xl:mt-20 xl:mr-4 ">
                <div class="pt-3 pb-3 dark:bg-gray-800 bg-white">
                    <div class="w-full  h-auto font-bold">
                        <x-templates.details :placeholder="'Book'"
                                             :data="$book->title">

                        </x-templates.details>
                        <x-templates.details :placeholder="'Volume Number'"
                                             :data="$volume->number">

                        </x-templates.details>
                        <x-templates.details :placeholder="'Volume Name'"
                                             :data="$volume->name">

                        </x-templates.details>
                        <x-templates.details :placeholder="'Release Date'"
                                             :data="$volume->created_at->diffForHumans()">

                        </x-templates.details>
                        <x-templates.details :placeholder="'Last Updated Date'"
                                             :data="$volume->updated_at->diffForHumans()">

                        </x-templates.details>
                        <x-templates.details :placeholder="'Country of Origin'"
                                             :data="'hf'">

                        </x-templates.details>

                    </div>
                </div>

                <div class="py-2 md:mt-4">
                    @livewire('backend.admin.books.page.create' ,['book'=> $book ,'volume'=>$volume ,
                    'chapter'=>$chapter ])
                </div>


            </div>


            <div class="col-span-4 xl:mt-12">


                @livewire('backend.admin.books.page.novel-data-table' ,['book'=> $book ,'volume'=>$volume ,
                'chapter'=>$chapter ])

            </div>
        </div>

    </div>



</x-layouts.admin_layout>
