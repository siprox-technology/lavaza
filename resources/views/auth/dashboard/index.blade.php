@extends('layouts.app')
@section('content')
    <main id="">
        <!-- ======= dashboard Section ======= -->
        <section id="dashboard">
            <div class="container-fluid">
                <div class="row mx-auto w-100 justify-content-center">
                    <div class="col-lg-5 col-md-7 col-sm-9 d-flex flex-column justify-content-center align-items-stretch border border-warning rounded p-3">
                        <div class="content text-right">
                            <h3 class="text-center">اطلاعات کاربر</h3>
                            {{-- name --}}
                            <p class="mb-0">: نام</p>
                            <p class="text-success">{{ auth()->user()->name }}</p>
                            {{-- Email --}}
                            <p class="mb-0">: ایمیل</p>
                            <p class="text-success mb-0">{{auth()->user()->email}}</p>
                            @if (!auth()->user()->email_verified_at)
                                <p class="text-danger mb-0">لطفا ایمیل خود را باز کرده و بر روی لینک تایید کلیک کنید</p>
                                <form action="{{ route('verification.send') }}" method="POST">
                                    @csrf
                                    <button type="submit"class="px-1 py-0" >ارسال مجدد لینک تایید</button>
                                </form>
                                @if (session('message'))
                                    <p class="text-success">{{ session('message') }}</p>
                                @endif
                            @else
                                <p class="text-success">ایمیل تایید شده</p>
                            @endif

                            {{-- phone --}}
                            <p class="mt-3 mb-0">تلفن:</p>
                            <p class="text-success">{{ auth()->user()->phone }}</p>

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
                    </div>

                </div>

            </div>
            <script>
                document.getElementById('dashboard').scrollIntoView();
            </script>

    </main><!-- End #main -->


@endsection
