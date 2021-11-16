@extends('layouts.app')
@section('content')
    <main id="main" class="">
        <!-- ======= Register Section ======= -->
        <section id="register" class="about">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 order-2 order-lg-1 align-items-stretch"
                        style='background-image: url("assets/img/about.jpg");'>
                        {{-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4"
                            data-vbtype="video" data-autoplay="true"></a> --}}
                    </div>
                    <div class="col-lg-7 col-sm-7 mx-auto d-flex order-1 order-lg-2 flex-column justify-content-center align-items-stretch">
                        <div class="content text-right">
                            <h3>ایجاد حساب کاربری</h3>
                            <form class="clearfix" action="{{ route('register') }}" method="post" id="register" novalidate>
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" id="name" maxlength="50"
                                        class="form-control @error('name') border border-danger @enderror" placeholder="نام"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div class=" text-danger mt-2">
                                            لطفا نام را با حروف فارسی وارد کنید
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" id="email" maxlength="50"
                                        class="form-control @error('email') border border-danger @enderror"
                                        placeholder="ایمیل" value="{{ old('email') }}">
                                    @error('email')
                                        <div class=" text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" id="phone" maxlength="11"
                                        class="form-control  @error('phone') border border-danger @enderror"
                                        placeholder="موبایل" value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="text-right text-danger mt-2">
                                            09** *** **** لطفا شماره را به صورت صحیح وارد کنید 
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" maxlength="30"
                                        class="form-control @error('password') border border-danger @enderror"
                                        placeholder="رمز عبور">
                                    @error('password')
                                        <div class=" text-danger mt-2">
                                            رمز عبور با رمز عبور مجدد یکسان نیست 
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        maxlength="30"
                                        class="form-control @error('password_confirmation') border border-danger @enderror"
                                        placeholder="تکرار رمز عبور">
                                    @error('password_confirmation')
                                        <div class=" text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" dusk="َUserRegisterSubmitBtn">ثبت نام</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

            </div>

            <script>
                document.getElementById("register").scrollIntoView();
            </script>
    </main><!-- End #main -->
@endsection
