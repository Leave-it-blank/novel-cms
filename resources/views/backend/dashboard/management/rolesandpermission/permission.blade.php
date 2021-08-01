<x-layouts.admin_layout>

    <div class="grid grid-rows-1 my-5 mx-2 mt-4 mb-0">

    </div>
    <div class="">
        <table class="flex overflow-hidden flex-row mb-5 w-full flex-no-wrap rounded-xs  ">
            <thead class="text-white">

            <!-- loop this as many time as data in small devices -->
            <tr class="flex hidden flex-col mb-2 space-y-2 text-gray-700 bg-teal-400 rounded-l-lg border-b-8 sm:block dark:border-dark border-light dark:text-white dark:bg-darker dark:bg-opacity-50 flex-no wrap sm:table-row sm:rounded-none sm:my-0">
                <th class="p-3 text-left">Permission Id</th>
                <th class="p-3 text-left">Permissio Name</th>
                <th class="p-3 text-left"> Updated at:</th>
                <th class="p-3 text-left">Created at</th>

            </tr>
            </thead>
            <tbody class="flex-1 text-gray-700 sm:flex-none dark:text-white dark:bg-dark">
            @foreach( $permissions as $permission)
                <tr x-data="{ open: false , volume: {{ $permission }} }"
                    class="flex flex-col mb-2 bg-white border-b-8 dark:border-dark border-light flex-no wrap sm:table-row dark:bg-darker rounded-xs">
                    <td class="p-3">
                        <div class="inline flex">
                            <div class="mr-2 text-center sm:hidden">{{'ID: '}} </div>
                            {{$permission->id  }}
                        </div>
                    </td>
                    <td class="py-3 px-4">
                        <div class="inline flex">
                            <div class="mr-2 text-left sm:hidden"> {{'Name: '}}</div> {{$permission->name}}
                        </div>
                    </td>
                    <td class="p-3">
                        <div class="inline flex">
                            <div class="mr-2 text-left sm:hidden"> {{'Updated at: '}}</div>
                            1
                        </div>
                    </td>
                    <td class="p-3 truncate">
                        <div class="inline flex">
                            <div
                                class="mr-2 text-left sm:hidden"> {{'Created at: '}}</div> {{$permission->updated_at->diffForHumans() }}
                        </div>
                    </td>



                </tr>


            @endforeach
            </tbody>
        </table>


    </div>


    <style>
        html,
        body {
            height: 100%;
        }

        @media (min-width: 640px) {
            table {
                display: inline-table !important;
            }

            thead tr:not(:first-child) {
                display: none;
            }
        }


    </style>


</x-layouts.admin_layout>
