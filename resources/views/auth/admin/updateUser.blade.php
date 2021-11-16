@extends('layouts.app')
@section('content')


    <main id="main">
        <div class="row justify-content-center py-5 w-100 mx-auto">
            <h1 class="text_yellow">پنل ادمین</h1>
        </div>
        <div class="row justify-content-center pb-5 w-100 mx-auto">
            <p class="">ویرایش اطلاعات کاربر</p>
        </div>
        <div class=" row justify-content-center pb-5 w-100
                mx-auto">
                <a href="{{ route('admin.index') }}">بازگشت به منوی اصلی</a>
        </div>
        <div class="row justify-content-center pb-5 w-100 mx-auto" id="admin-panel">
            <div class="col-12">
                {{-- update user status --}}
                @if (session('status'))
                    @if (session('status') == 'ویرایش کاربر انجام شد')
                        <div class="text-center text-success mt-2">
                            {{ session('status') }}
                        </div>
                    @endif
                @endif
            </div>
            {{-- update user form --}}
            <div class="col-sm-10 col-md-8 col-lg-6 ">
                <div class="heading-title">
                    <div class=" flex justify-center">
                        <div class=" w-6/12 bg-white p-6 rounded-lg">
                            <div class="block text-center">
                                {{-- edit user details --}}
                                <form class="text-left clearfix" action="{{ route('admin.user.update') }}" method="POST">
                                    @csrf
                                    {{-- name --}}
                                    <div class="form-group text-left mb-0">
                                        <label class="mt-2 mb-0" for="contact_pref"><b>نام:</b></label>
                                        <input type="text" name="name" id="name" maxlength="50"
                                            class="form-control @error('name') border border-danger @enderror"
                                            value="{{ $user->name }}">
                                    </div>
                                    {{-- phone --}}
                                    <div class="form-group text-left mb-0">
                                        <label class="mt-2 mb-0" for="contact_pref"><b>موبایل:</b></label>
                                        <input type="text" name="phone" id="phone" maxlength="11"
                                            class="form-control  @error('phone') border border-danger @enderror"
                                            value="{{ $user->phone }}">
                                        @error('phone')
                                            <div class="text-right text-danger mt-2">
                                                09** *** **** لطفا شماره را به صورت صحیح وارد کنید 
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- address --}}
                                    <div class="form-group text-left mb-0">
                                        <label class="mt-2 mb-0" for="address"><b>ادرس:</b></label>
                                        <input type="text" name="address" id="address" maxlength="150"
                                            class="form-control  @error('address') border border-danger @enderror"
                                            value="{{ $user->address }}">
                                        @error('address')
                                            <div class=" text-danger">
                                                *لطفا اطلاعات ادرس را به درستی وارد کنید
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- user id --}}
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <div class="text-center my-2">
                                        <button type="submit" dusk="submit_btn" class="btn btn-primary">ویرایش</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- scroll to admin panel --}}
    <script type="text/javascript">
        document.getElementById("admin-panel").scrollIntoView();
    </script>
@endsection
