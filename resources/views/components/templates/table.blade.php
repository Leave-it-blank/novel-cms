@props(['column_name','data' ])

<table class="flex overflow-hidden flex-row mb-5 w-full flex-no-wrap rounded-xs sm:shadow-lg">
    <thead class="text-white">
    <!-- loop this as many time as data in small devices -->
    <tr class="flex hidden flex-col mb-2 space-y-2 text-gray-700 bg-teal-400 rounded-l-lg border-b-8 sm:block dark:border-dark border-light dark:text-white dark:bg-dark flex-no wrap sm:table-row sm:rounded-none sm:my-0">

        <th class="p-3 text-left">Page Name</th>
        <th class="p-3 text-left">File size </th>
        <th class="p-3 text-left">Page number</th>
        <th class="p-3 text-left">Created at</th>
        <th class="p-3 text-left" width="110px">View</th>
        <th class="p-3 text-left"> Action</th>
    </tr>
    </thead>
    <tbody class="flex-1 text-gray-700 sm:flex-none dark:text-white dark:bg-dark">

    <tr  x-data="{ open: false }" class="flex flex-col mb-2 bg-white border-b-8 dark:border-dark border-light flex-no wrap sm:table-row dark:bg-darker rounded-xs">
        <td class="p-3">
            <div class="inline flex">
                <div class="mr-2 text-left sm:hidden">{{'Page Name: '}} </div> p1v
            </div>
        </td>
        <td class="py-3 px-4">
            <div class="inline flex">
                <div class="mr-2 text-left sm:hidden"> {{'File Size: '}}</div> {{' 2421kb'}}
            </div>
        </td>
        <td class="p-3">
            <div class="inline flex">
                <div class="mr-2 text-left sm:hidden"> {{'Page number: '}}</div> 1
            </div>
        </td>
        <td class="p-3 truncate">
            <div class="inline flex">
                <div class="mr-2 text-left sm:hidden"> {{'Created at: '}}</div>2 days ago
            </div>
        </td>
        <td class="p-3 text-red-400 cursor-pointer dark:hover:text-white hover:text-red-600 hover:font-medium">
            <x-buttons.create class="py-1 px-4 w-full text-black border border-red-400 hover:bg-red-500 hover:text-white dark:text-white text">View
            </x-buttons.create>
        </td>
        <td class="p-2 w-5 text-center">
            <x-buttons.create class="py-1 px-4 w-full text-black border border-red-400 hover:bg-red-500 hover:text-white dark:text-white text">Delete
            </x-buttons.create>
        </td>

    </tr>
    </tbody>
</table>

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
