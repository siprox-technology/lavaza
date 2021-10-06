@extends('layouts.app')
@section('content')


    <main id="reservation_form" class="col-12">
        <div class="row justify-content-center py-5 w-100 mx-auto">
            <h1 class="text_yellow">پنل ادمین</h1>
        </div>
        <div class="row justify-content-center py-5 w-100 mx-auto">
            <h1 class="text_yellow">رزرو میز</h1>
        </div>

        <div class="row justify-content-center w-100 m-0">
            {{-- reservation form --}}

            <form class="text-left clearfix" action method="post">
                @csrf
                <div class="form-group">
                    <div class="row justify-content-center">
                        <input type="text" name="date" class="form-control " id="reservation_date" id="date" placeholder="انتخاب تاریخ">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="email" id="email" maxlength="50" class="form-control " placeholder="ایمیل" value="">
                </div>
                <div class="form-group">
                    <input type="text" name="phone" id="phone" maxlength="11" class="form-control  " placeholder="تلفن" value="">
                                                    </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" maxlength="30" class="form-control " placeholder="رمز عبور">
                                                    </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" id="password_confirmation" maxlength="30" class="form-control " placeholder="تکرار رمز عبور">
                                                    </div>
                <div class="text-center">
                    <button type="submit" dusk="َUserRegisterSubmitBtn">ثبت  رزرو</button>
                </div>
            </form>
        </div>
        {{-- resevations --}}
        <div class="row">

        </div>
    </main>

    {{-- modals --}}
    <script type="text/javascript">
        document.getElementById("reservation_form").scrollIntoView();
    </script>
@endsection
