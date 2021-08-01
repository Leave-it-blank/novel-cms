<x-layouts.admin_layout>


    <div class="container flex overflow-auto sm:justify-center">
        <div class="row">
            <!-- bead come don't touch yet -->


            <div class="shadow-2xl col-md-8">

                <div class="block m-5">
                    <div class="p-4"> Edit {{ $user->name }}


                        <div class="p-4">

                            <form action="{{ route('admin.user.update', $user) }} " method="POST">

                                <!-- email/user name-->
                                <div class="form-group row">
                                    <label for="email" class="p-4 text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class=" p-2 m-3 @error('email') is-invalid @enderror"
                                               style="background-color: transparent;" name="email"
                                               value="{{ $user->email }}"
                                               required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="p-4 text-md-right">{{ __('UserName') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="p-2 m-3 @error('name') is-invalid @enderror"
                                               style="background-color: transparent;" name="name"
                                               value="{{ $user->name }}"
                                               autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="country" class="p-4 text-md-right">{{ __('Country') }}</label>

                                    <div class="col-md-6">
                                        <input id="country" type="text"
                                               class="p-2 m-3 @error('country') is-invalid @enderror"
                                               style="background-color: transparent;" name="country"
                                               value="{{ $user->country }}" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- user roles -->
                                @csrf
                                {{ method_field('PUT') }}

                                <div class="m-3 row">

                                    <div class="col-md-12">
                                        <label for="roles"
                                               class="col-md-2 col-form-label text-md-left"><strong>{{ __('User Roles') }}</strong></label>
                                        @foreach ($roles as $role)

                                            <div class="m-4">

                                                <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                                       @if ($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                                <label>{{ $role->name }} </label>
                                            </div>

                                        @endforeach
                                    </div>
                                </div> <!-- issues of error #1-->

                                <button type="submit"
                                        class="p-2 m-4 text-green-200 bg-red-600 hover:border-yellow-500 hover:bg-yellow-300 hover:text-red-700">
                                    UPDATE
                                </button>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
</x-layouts.admin_layout>
