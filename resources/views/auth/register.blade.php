@extends('layouts.app')

@section('content')
<div class=" bg-[#C5D5E2] py-4 h-full min-h-screen">
    <div class="mx-auto w-1/3 bg-white rounded-lg">
        <div class="py-4 px-7 ">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h3 class="font-medium pb-3 text-center">Register</h3>

                        <div class="mb-3 px-3">
                            <label for="name" class="form-label ">Name</label>

                            <div>
                                <input id="name" type="text" class="form-control border-2 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 px-3">
                            <label for="email" class="form-label ">{{ __('Email') }}</label>

                            <div>
                                <input id="email" type="email" class="border-2 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 px-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>

                            <div>
                                <input id="password" type="password" class="border-2 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" mb-3 px-3">
                            <label for="password-confirm" class="form-label ">{{ __('Confirm Password') }}</label>

                            <div >
                                <input id="password-confirm" type="password" class=" border-2 form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- <div class=" mb-3 px-3">
                            <label for="role_as" class="form-label ">{{ __('User role') }}</label>

                            <select id="role_as" name="role_as" class="form-control">
                                <option value="0">User</option>
                                <option value="2">Teacher</option>
                            </select>
                        </div> --}}

                        <div class=" mb-0 px-3">
                            <div>
                                <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-600 font-sans rounded-md px-4 py-1 mt-2 mr-2 text-center focus:outline">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class=" text-center py-3">
                        Already have an account?
                        <a href={{ route('login') }}>Sign in instead</a>
                    </div>

                </div>

    </div>
</div>
@endsection
