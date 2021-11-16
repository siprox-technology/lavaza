@extends('layouts.app')

@section('content')
    <!-- reset password form -->
    <section class="signin-page account bg-gray" id="reset-pass">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-10 mx-auto">
                    <div class="block text-center">

                        <div class="row justify-content-center py-3 w-100 mx-auto">
                            <h3 class="">تغییر رمز عبور</h3>
                        </div>
                        <form class="text-left clearfix" action="{{ route('password.update') }}" method="POST">
                            @csrf
                            {{-- email --}}
                            <div class="form-group text-right mb-1">
                                <label class="mt-2 mb-1" >: ایمیل</label>
                                <input type="text" dusk="email_input" name="email" id="email" maxlength="50"
                                    class="form-control @error('email') border border-danger @enderror">
                                @error('email')
                                    <div class="text-right text-danger mt-2">
                                        لطفا ساختار ایمیل را به درستی وارد کنید 
                                    </div>
                                @enderror
                            </div>

                            {{-- phone --}}
                            <div class="form-group text-right">
                                <label class="mt-2 mb-1" >: موبایل</label>
                                <input type="text" name="phone" id="phone" maxlength="11"
                                    class="form-control  @error('phone') border border-danger @enderror"
                                    value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="text-right text-danger mt-2">
                                       09** *** **** لطفا شماره را به صورت صحیح وارد کنید 
                                    </div>
                                @enderror
                            </div>
                            {{-- new password --}}
                            <div class="form-group text-right mb-1">
                                <label class="mt-2 mb-1">: رمز عبور جدید</label>
                                <input type="password" name="password" id="password" maxlength="30"
                                    class="form-control @error('password') border border-danger @enderror">
                                @error('password')
                                    <div class=" text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- new password confirm --}}
                            <div class="form-group  text-right mb-1">
                                <label class="mt-2 mb-1">: تایپ مجدد رمز عبور</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    maxlength="30"
                                    class="form-control @error('password_confirmation') border border-danger @enderror">
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
                                <button type="submit" class="btn btn-primary">تغییر رمز عبور</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        document.getElementById("reset-pass").scrollIntoView();
    </script>
@endsection
