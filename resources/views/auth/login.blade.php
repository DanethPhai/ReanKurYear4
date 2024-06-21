@extends('layouts.app')

@section('content')
<div class=" bg-[#C5D5E2] py-4 h-full min-h-screen">
    <div class="mx-auto w-1/3 bg-white rounded-lg">
        <div class="py-4 px-7">
            @php
                if(Auth::check()) {
                    // 1 == admin
                    // 0 == user
                    if(Auth::user()->role_as == '1') {
                        return redirect('/admin/products');
                    }
                    else {
                        return  redirect('/home')->with('message', 'Access Denied As You are not An Admin');
                    }
                }
            @endphp
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h3  class=" font-medium pb-3 text-center">Login</h3>

                <div class="mb-3 px-3">
                    <div for="email" class=" form-label">Email</div>

                    <div>
                        <input id="email" type="email" class="form-control border-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class=" mb-3 px-3">
                    <label for="password" class="form-label">Password</label>

                    <div>
                        <input id="password" type="password" class="form-control border-2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 px-3">
                    <div class=" ">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mb-0 px-3">
                    <div class=" ">
                        <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-600 font-sans rounded-md px-4 py-1 mt-2 mr-2 text-center focus:outline">
                            Login
                        </button>

                        {{-- @if (Route::has('password.request'))
                            <a class="no-underline text-center" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        @endif --}}
                    </div>
                </div>
            </form>

            <div class=" text-center py-3">
                New on our platform?
                <a href={{ route('register') }}>Create an account</a>
            </div>
        </div>

    </div>
</div>
@endsection
