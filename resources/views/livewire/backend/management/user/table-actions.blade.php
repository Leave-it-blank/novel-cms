


<div class="flex space-x-1 justify-around">

        <div x-data="{ dropdownOpen: false }" class="relative" x-cloak>
            <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md bg-white p-2 focus:outline-none">
                <svg class="h-5 w-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>

            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

            <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
              @foreach(App\Models\User::find($id)->getRoleNames() as $userrole)
                    <div class="block px-4 py-2 text-sm capitalize text-gray-700 ">
                        {{$userrole}}
                    </div>
                @endforeach

            </div>
        </div>
    <a href="{{route('admin.user.edit', ['user'=>$id])}}"  class="p-1 mt-1 text-teal-600 hover:bg-teal-600 hover:text-red-500 rounded"> <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
    </a>

    {{-- <a href="{{route('admin.book.edit', ['book'=>$id])}}"
    class="p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded">
    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
    </svg>
    </a> --}}
    @can('admin')
    <button  onclick="confirm('Are you sure you want to remove the user from this group?')|| event.stopImmediatePropagation()" wire:click="delete_user({{ $id }})"  class="p-1 text-red-600 hover:bg-red-600 hover:text-white rounded">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
    </button>
    @endcan
</div>
