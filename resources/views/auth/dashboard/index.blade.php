@extends('layouts.app')
@section('content')



    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-5 align-items-stretch video-box"
                        style='background-image: url("assets/img/about.jpg");'>
                        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4"
                            data-vbtype="video" data-autoplay="true"></a>
                    </div>

                    <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

                        <div class="content">
                            <h3>Dashboard</h3>
                            {{-- name --}}
                            <p>نام:</p>
                            <p class="text-success">{{ auth()->user()->name }}</p>

                            {{-- Email --}}
                            <p>ایمیل:</p>
                            @if (!auth()->user()->email_verified_at)
                                <p class="text-danger">لطفا ایمیل خود را باز کرده و بر روی لینک تایید کلیک کنید</p>
                                <form action="{{ route('verification.send') }}" method="POST">
                                    @csrf
                                    <button type="submit">resend verification email</button>
                                </form>
                                @if (session('message'))
                                    <p class="text-success">{{ session('message') }}</p>
                                @endif
                            @else
                                <p class="text-success">Email verified</p>
                            @endif
                            {{-- phone --}}
                            <p>تلفن:</p>
                            <p class="text-success">{{ auth()->user()->phone }}</p>

                            {{-- Address --}}
                            <p>ادرس:</p>
                            @if (!auth()->user()->address)
                                {{-- save address --}}
                                <p class="text-danger">در حال حاضر ادرسی ذخیره نشده است</p>
                            @else
                                <p class="text-success">{{ auth()->user()->address }}</p>
                            @endif

                            {{-- Order history --}}
                            <a dusk="order_history" href="{{ route('dashboard.order-history.index') }}">سفارشات قبلی</a>
                        </div>

                        {{-- edit user details --}}

                        <a dusk="profile_link" href="{{ route('dashboard.user.update.index') }}">پروفایل </a>

                        {{-- تغییر رمز عبور --}}

                        <a dusk="changePassword_link" href="{{ route('forgetPassword.index') }}">تغییر رمز عبور</a>
                    </div>

                </div>

            </div>


    </main><!-- End #main -->


@endsection
