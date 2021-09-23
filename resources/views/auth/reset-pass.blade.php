@extends('layouts.app')

@section('content')

    <!-- reset password form -->
    <section class="signin-page account bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-10 mx-auto">
                    <div class="block text-center">
                        <a class="logo" href="index.html">
                            <img src="{{ asset('images/logo.png') }}" alt="logo">
                        </a>
                        <h4 class="text-center mt-3">Reset your password:</h4>
                        <form class="text-left clearfix" action="{{ route('password.update') }}" method="POST">
                            @csrf
                            {{-- email --}}
                            <div class="form-group">
                                <input type="text" name="email"
                                    class="form-control @error('email') border border-danger @enderror"
                                    placeholder="Your email">
                                @error('email')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- new password --}}
                            <div class="form-group">
                                <input type="password" name="password" id="password" maxlength="30"
                                    class="form-control @error('password') border border-danger @enderror"
                                    placeholder="Your password">
                                @error('password')
                                    <div class=" text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- new password confirm --}}
                            <div class="form-group">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    maxlength="30"
                                    class="form-control @error('password_confirmation') border border-danger @enderror"
                                    placeholder="Your password again">
                                @error('password_confirmation')
                                    <div class=" text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <input type="hidden" name="token" id="token" value="{{ $token }}">
                            <div class="text-success my-2 text-center">
                                @if (session('status'))
                                    {{ session('status') }}
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Reset pass</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
