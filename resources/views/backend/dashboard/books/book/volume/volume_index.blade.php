<x-layouts.admin_layout>
    {{-- js ends and css start for volumes --}}
    <div class="container">
        @include('partials.alerts')
        <div class="grid grid-cols-2">
            <a href="{{route('admin.book.edit', ['book'=> $book])}}">
                <x-buttons.create class="px-3 mx-2 text-white dark:bg-white bg-dark dark:text-black">
                    Edit Book
                </x-buttons.create>
            </a>
            @livewire('backend.admin.books.volume.create', ['book' =>$book] )
        </div>
        <div class="grid grid-cols-1 xl:grid-cols-6">
            <div class="grid col-span-2 ">
                <div class="  mt-5 ">
                    <div class="dark:text-gray-100 text-gray-900 text-2xl mx-10 my-2 text-left">
                        {{ $book->title }}
                    </div>
                    <img class="rounded-sm shadow-lg w-60 mx-auto p-3" src="{{$book->getFirstMediaUrl()}}">
                    <div class="dark:text-red-100 text-center grid content-center place-content-center     ">
                        <div class="my-3 ">

                            <div class="min-w-32 bg-white dark:bg-black min-h-60 p-10 mb-4 font-medium   my-5 ">
                                <div
                                    class="w-32 flex-none rounded-t lg:rounded-t-none lg:rounded-l text-center shadow-lg ">
                                    <div class="block rounded-t overflow-hidden  text-center ">
                                        <div class="bg-blue-500 text-white py-1">
                                            {{ $book->updated_at->format('M') }}
                                        </div>
                                        <div class="pt-1 border-l border-r border-white bg-white dark:text-gray-900">
                                            <span class="text-5xl font-bold leading-tight">
                                                {{ $book->updated_at->format('d') }}
                                            </span>
                                        </div>
                                        <div
                                            class="border-l border-r border-b rounded-b-lg text-center border-white bg-white dark:text-gray-900 -pt-2 -mb-1">
                                            <span class="text-sm">
                                                {{ $book->updated_at->format('D') }}
                                            </span>
                                        </div>
                                        <div
                                            class="pb-2 border-l border-r border-b rounded-b-lg text-center border-white  dark:text-gray-900 bg-white">
                                            <span class="text-xs leading-normal">
                                                {{ $book->updated_at->diffForHumans() }}
                                            </span>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="grid col-span-4 overflow-auto">
                <div class="m-2 md:m-8">
                    <livewire:backend.admin.books.volume.table params="{{$book->id}}" />
                </div>
            </div>
        </div>


    </div>

</x-layouts.admin_layout>
