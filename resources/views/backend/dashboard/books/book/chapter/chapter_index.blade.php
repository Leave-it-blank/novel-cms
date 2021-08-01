<x-layouts.admin_layout>
    <div class="container p-1 md:p-5 ">
        @include('partials.alerts')
        <div class="flex justify-between  place-items-center ">

            <div class="py-1 px-6 rounded-md">
                <div class=" font-bold  text-md sm:text-2xl"> {{'Volume '.$volume->number}}
                </div>
                <div class="text-sm pt-3">
                    {{$volume->name}}
                </div>
            </div>
            <a href="{{route('admin.book.show', ['book' => $book])}}">
                <x-buttons.create
                    class="  px-3 mx-2 text-white dark:bg-white bg-dark dark:text-black">View Book
                </x-buttons.create>
            </a>

        </div>

        <div class="grid grid-cols-1 xl:grid-cols-6">

            <div class="xl:col-span-2 mt-4 xl:mt-20 xl:mr-4 ">
            <div class="flex justify-center mb-2" >    <img class="w-50 h-100" src=" {{$book->getFirstMediaUrl('thumbnail')}}" > </div>

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


                @livewire('backend.admin.books.chapter.create', ['book' =>$book , 'volume'=>$volume] )


            </div>


            <div class="col-span-4 xl:mt-12">
                @php ($params[0] = $book->id)
                @php ($params[1]  = $volume->id)
                <livewire:backend.admin.books.chapter.table params="{{ implode(', ', $params)  }}"/>


            </div>
        </div>

    </div>
</x-layouts.admin_layout>
