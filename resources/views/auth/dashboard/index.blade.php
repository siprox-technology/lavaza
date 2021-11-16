@extends('layouts.app')
@section('content')
    <main id="">
        <!-- ======= dashboard Section ======= -->
        <section id="dashboard">
            <div class="container-fluid">
                <div class="row mx-auto w-100 justify-content-center">
                    <div class="col-lg-5 col-md-7 col-sm-9 d-flex flex-column justify-content-center align-items-stretch border border-warning rounded p-3">
                       
                        @if ((auth()->user()->email_verified_at)||(auth()->user()->phone_verified_at))
                            <div class="content text-right">
                                <h3 class="text-center">حساب کاربری</h3>
                                {{-- name --}}
                                <p class="mb-0">: نام</p>
                                <p class="text-success">{{ auth()->user()->name }}</p>
                                {{-- Email --}}
                                <p class="mb-0">: ایمیل</p>
                                <p class="text-success mb-0">{{auth()->user()->email}}</p>
                                {{-- phone --}}
                                <p class="mt-3 mb-0">: موبایل</p>
                                <p class="text-success">{{ auth()->user()->phone }}</p>
                                {{-- account status --}}
                                <p class="mt-3 mb-0">: حساب کاربری</p>
                                <p class="text-success ">فعال شده </p>
                                {{-- Address --}}
                                <p class="mb-0">ادرس:</p>
                                @if (!auth()->user()->address)
                                    {{-- save address --}}
                                    <p class="text-danger">در حال حاضر ادرسی ذخیره نشده است</p>
                                @else
                                    <p class="text-success">{{ auth()->user()->address }}</p>
                                @endif
                                <div class="row w-100 mx-auto justify-content-center">
                                    {{-- Order history --}}
                                    <a class="btn btn-warning  m-2 " dusk="order_history" href="{{ route('dashboard.order-history.index') }}">سفارشات قبلی</a>
                                    {{-- edit user details --}}
                                    <a class="btn btn-warning  m-2" dusk="profile_link" href="{{ route('dashboard.user.update.index') }}">ویرایش </a>
                                    {{-- تغییر رمز عبور --}}
                                    <a class="btn btn-warning  m-2" dusk="changePassword_link" href="{{ route('forgetPassword.index') }}">تغییر رمز عبور</a>
                                </div>
                            </div>
                       @else
                            {{-- send verification sms again --}}
                            <h6 class="text-center mb-0">لطفا کد تایید پیامک شده را وارد نمایید</h6>
                            {{-- verify sms verification code --}}
                            <form action="{{route('SmsVerification.verify')}}" method="POST" class="text-center">
                                @csrf
                                <input type="text" name="code" id="" class="@error('code') border border-danger @enderror">
                                    @error('code')
                                        <div class="text-danger mt-2">
                                            کد وارد شده اشتباه است
                                        </div>
                                    @enderror
                                <button type="submit">تایید</button>
                            </form>
                            <form action="{{route('SmsVerification.send')}}" method="POST" class="text-center">
                                @csrf
                                <input type="hidden" name="phone" value="{{auth()->user()->phone}}">
                                <button type="submit"class="px-2 py-1" >ارسال مجدد کد تایید</button>
                            </form>
                            {{-- sms verification status --}}
                            @if (session('status'))
                                @if (session('status')=='کد مورد نظر منقضی شده. لطفا دوباره درخواست نمایید')
                                    <div class="text-center text-danger mt-1">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if (session('status')=='کد تایید به شماره شما ارسال شد')
                                    <div class="text-center text-success mt-1">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if (session('status')=='کد تایید به شماره شما ارسال نشد')
                                    <div class="text-center text-danger mt-1">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            @endif
                            {{-- send verification email again --}}
                            <p class="text-center mb-0 mt-4">در صورت تمایل میتوانید با کلیک بر روی لینک ارسال شده به ایمیل حساب خود را فعال سازی کنید</p>
                            <form action="{{ route('verification.send') }}" method="POST" class="text-center">
                                @csrf
                                <button type="submit"class="px-2 py-1 mt-1" >ارسال مجدد لینک تایید</button>
                            </form>
                            @if (session('message'))
                                @if (session('message')=='لینک تایید به ایمیل شما ارسال شد')
                                    <p class="text-success text-center mt-1">{{ session('message') }}</p>
                                @endif
                            @endif
                       @endif
                    </div>
                </div>
            </div>
            <script>
                document.getElementById('dashboard').scrollIntoView();
            </script>

    </main><!-- End #main -->


@endsection
