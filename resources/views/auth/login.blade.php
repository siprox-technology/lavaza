@extends('layouts.app')
@section('content')
    <main id="main">
        <!-- ======= login Section ======= -->
        <section id="login" class="about">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 align-items-stretch video-box"
                        style='background-image: url("assets/img/about.jpg");'>
                       {{--  <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4"
                            data-vbtype="video" data-autoplay="true"></a> --}}
                    </div>
                    <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">
                        {{-- update password status --}}
                        @if (session('status'))
                            <div class="text-center text-success mt-2">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="content text-right">
                            <h3>ورود به حساب کاربری</h3>
                            <form class="text-left clearfix" method="POST" id="login" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email"
                                        class="form-control 
                        @error('email') border border-danger @enderror 
                        @error('status') border border-danger @enderror"
                                        placeholder="ایمیل" value="{{ old('email') }}">
                                    @error('email')
                                        <div class=" text-danger mt-2 ">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password"
                                        class="form-control 
                        @error('password') border border-danger @enderror 
                        @error('status') border border-danger @enderror"
                                        placeholder="رمز عبور">
                                    @error('password')
                                        <div class=" text-danger mt-2 ">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" dusk="submit_btn" class="btn btn-primary">ورود</button>
                                </div>
                                @error('status')
                                    <div class="text-center text-danger mt-2 ">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </form>
                            <p class="mt-3">کاربر جدید هستید؟<a href="{{ route('register.index') }}"> ایجاد حساب کاربری</a></p>
                            <a href="{{ route('forgetPassword.index') }}">
                                <p class="mt-3">رمز عبور را فراموش کردم</p>
                            </a>
                        </div>

                    </div>

                </div>

            </div>


    </main><!-- End #main -->
@endsection
