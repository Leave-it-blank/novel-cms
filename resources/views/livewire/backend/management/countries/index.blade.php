<div>
    <div class="">
        <table class="flex overflow-hidden flex-row mb-5 w-full flex-no-wrap rounded-xs py-3 ">
            <thead class="text-white">

            <!-- loop this as many time as data in small devices -->
            <tr class="flex hidden flex-col mb-2 space-y-2 text-gray-700 bg-teal-600 rounded-l-lg border-b-8 sm:block dark:border-dark border-light dark:text-white dark:bg-gray-900    flex-no wrap sm:table-row sm:rounded-none sm:my-0">
                <th class="p-3 text-left">Country Id</th>
                <th class="p-3 text-left">Country Name</th>
                <th class="p-3 text-left">Country Code</th>
                <th class="p-3 text-left">Created at</th>
                <th class="p-3 text-left" width="110px">Number of times used</th>
                <th class="p-3 text-left"> Action</th>
            </tr>
            </thead>
            <tbody class="flex-1 text-gray-700 sm:flex-none dark:text-white dark:bg-dark">
            @foreach( $countries = $this->get_country() as $country)
                <tr x-data="{ open: false , country: {{ $country }} }"
                    class="flex flex-col mb-2 bg-white border-b-8 dark:border-dark border-light flex-no wrap sm:table-row dark:bg-darker rounded-xs">
                    <td class="p-3">
                        <div class="inline flex">
                            <div class="mr-2 text-center sm:hidden">{{'ID: '}} </div>
                            {{$country->id  }}
                        </div>
                    </td>
                    <td class="py-3 px-4">
                        <div class="inline flex">
                            <div class="mr-2 text-left sm:hidden"> {{'Name: '}}</div> {{$country->name}}
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
                                class="mr-2 text-left sm:hidden"> {{'Created at: '}}</div> {{$country->code }}
                        </div>
                    </td>
                    <td class="p-3 text-sm text-red-400 cursor-pointer text-green-400  hover:font-medium">
               {{'Tags'}}
                    </td>
                    <td class="p-2 w-5 text-center">
                        <x-buttons.create class="hover:bg-red-500 text-black dark:text-white sm:hover:bg-transparent sm:hover:text-red-500
					                             hover:text-gray-50  rounder-lg border border-red-400 px-4 py-1 sm:border-0"
                                          @click="open = true" href="#">
                            <div class="hidden sm:block"><i class="fas fa-ellipsis-v"></i></div>
                            <div class="sm:hidden"> Action</div>
                        </x-buttons.create>
                    </td>
                    <template x-if="open">
                        <ul @click.away="open = false"
                            x-transition:enter="transition ease-out origin-top-left duration-200"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition origin-top-left ease-in duration-100"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-90"
                            class="py-1 px-3 mx-2 mb-2 bg-white rounded shadow dark:bg-gray-800 sm:absolute sm:right-20 sm:my-12">

                            <li onclick="confirm('Are you sure you want to remove the user from this group?')|| event.stopImmediatePropagation()"
                                x-on:click="@this.delete_country(country)"
                                class="py-3 px-3 text-sm font-normal tracking-normal leading-3 text-gray-600 cursor-pointer dark:text-gray-400 hover:bg-indigo-700 hover:text-white">
                                Delete
                            </li>
                        </ul>

                    </template>

                </tr>


            @endforeach
            </tbody>
        </table>
        <div class="dark:text-white">
            {{ $countries->links() }}
        </div>

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

</div>
