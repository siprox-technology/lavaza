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
                            <h4 class="text-center mt-3">لطفا ایمیل خود را وارد کنید</h4>
                            <form class="text-left clearfix" action="{{ route('forgetPassword.email') }}" method="POST" novalidate>
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
                                @if (session('status'))
                                    <div class="text-success my-2 text-center">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="text-center">
                                    <button type="submit" dusk="submit_btn" class="btn btn-primary">درخواست تغییر رمز</button>
                                </div>
                            </form>
                            <p class="mt-3 text-right">کاربر جدید هستید؟<a href="{{ route('register.index') }}"> ایجاد حساب کاربری</a></p>
                            </a>
                        </div>

                    </div>

                </div>

            </div>


    </main><!-- End #main -->
    {{-- scroll to forget password section --}}
    <script type="text/javascript">
        document.getElementById("forget-pass").scrollIntoView();
    </script>


@endsection
