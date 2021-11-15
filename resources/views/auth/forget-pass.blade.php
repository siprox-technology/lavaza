@extends('layouts.app')
@section('content')
    <main id="main">
        <!-- ======= forget password Section ======= -->
        <section id="forget-pass" class="about">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 order-2 order-lg-1 align-items-stretch video-box mt-5 mt-lg-0"
                        style='background-image: url("assets/img/about.jpg");'>
{{--                         <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4"
                            data-vbtype="video" data-autoplay="true"></a> --}}
                    </div>
                    <div class="col-lg-7 col-sm-7 mx-auto  d-flex order-1 order-lg-2 flex-column justify-content-center align-items-stretch">

                        <div class="content">
                            <h4 class="text-center mt-3">لطفا ایمیل و شماره تلفن خود را وارد کنید</h4>
                            <div class="row justify-content-center pb-3 w-100 mx-auto">
                                <a href="{{route('dashboard.index')}}">بازگشت به منوی اصلی</a>
                            </div>
                            <form class="text-left clearfix" action="{{ route('forgetPassword.send') }}" method="POST" novalidate>
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="email" dusk="email_input"
                                        class="form-control @error('email') border border-danger @enderror"
                                        placeholder="ایمیل">
                                    @error('email')
                                        <div class="text-danger text-right mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" id="phone" maxlength="11" dusk="phone_input"
                                        class="form-control  @error('phone') border border-danger @enderror"
                                        placeholder="تلفن" value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="text-right text-danger mt-2">
                                           09** *** **** لطفا شماره را به صورت صحیح وارد کنید 
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select name="send_method" dusk="send_method_select" class="form-control text-right @error('send_method') border border-danger @enderror">
                                        <option value="0" default class="text-right"> لینک به موبایل پیامک شود</option>
                                        <option value="1" class="text-right">لینک به ایمیل ارسال شود</option>
                                    </select>
                                </div>
                                @if (session('status'))
                                    <div class="text-success my-2 text-center">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="text-center">
                                    <button type="submit" dusk="submit_btn" class="btn btn-warning">درخواست تغییر رمز</button>
                                </div>
                            </form>
                            <p class="mt-3 text-right">کاربر جدید هستید؟<a href="{{ route('register.index') }}"> ایجاد حساب کاربری</a></p>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
    </main><!-- End #main -->
    <script type="text/javascript">
        document.getElementById("forget-pass").scrollIntoView();
    </script>


@endsection
