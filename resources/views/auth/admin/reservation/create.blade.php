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
                        <input type="text" name="date" class="form-control"  autocomplete="off" id="reservation_date" id="date" placeholder="انتخاب تاریخ">
                    </div>
                </div>
                <div class="form-group">
                    <input type="time" id="time" name="time" min="08:00" max="23:00" placeholder="زمان">
                </div>
                <div class="form-group">
                    <select name="user_name" id="">
                        <option value="">انتخاب اسم کاریر</option>
                    @foreach ($users as $user)
                        <option value="{{$user->name}}">{{$user->name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="number" name="tabel_number" min="1" max="30" class="form-control " placeholder="شماره میز">
                </div>
                {{-- here price --}}
                <div class="form-group">
                    <input type="text" name="password_confirmation" id="password_confirmation" maxlength="30" class="form-control " placeholder="تکرار رمز عبور">
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
