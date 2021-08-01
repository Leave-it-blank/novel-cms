<x-layouts.admin_layout>

    <div class="container m-2">
        <div class="flex justify-between  place-items-center ">

            <div class="py-1 px-6 rounded-md">
                <div class=" font-bold  text-md sm:text-2xl"> {{'Page '.$page->name}}
                </div>
                <div class="text-sm pt-3">
                    {{$page->id}}
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
                <a href="{{route('admin.chapter.show', ['book' => $book, 'volume'=>$volume, 'chapter'=>$chapter])}}">
                    <x-buttons.create
                        class="  px-3 mx-2 text-white dark:bg-white bg-dark dark:text-black">Go back
                    </x-buttons.create>
                </a>
            </div>
        </div>
        <div class="flex justify-center">
            <img class= " " src="{{$url}}">
        </div>

    </div>

</x-layouts.admin_layout>
