@extends('layouts.app')
@section('content')

<section>
    <main id="main">
        <div class="row justify-content-center py-2 w-100 mx-auto">
            <h3 class="">ویرایش اطلاعات کاربر</h3>
        </div>
        <div class="row justify-content-center pb-2 w-100 mx-auto">
            <p class=""></p>
        </div>
        <div class=" row justify-content-center pb-2 w-100 mx-auto">
            <a href="{{ route('admin.users.index') }}">بازگشت به لیست کاربرها</a>
        </div>
        <div class="row justify-content-center pb-5 w-100 mx-auto" id="admin-panel">
            <div class="col-12">
                {{-- update user status --}}
                @if (session('status'))
                    @if (session('status') == 'ویرایش کاربر انجام شد')
                        <div class="text-center text-success my-2">
                            {{ session('status') }}
                        </div>
                    @endif
                @endif
            </div>
            {{-- update user form --}}
            <div class="col-sm-10 col-md-8 col-lg-6 p-3 border border-warning rounded">
                <div class="heading-title">
                    <div class=" flex justify-center">
                        <div class=" w-6/12 bg-white p-6 rounded-lg">
                            <div class="block text-center">
                                {{-- edit user details --}}
                                <form class=" clearfix" action="{{ route('admin.user.update') }}" method="POST">
                                    @csrf
                                    {{-- name --}}
                                    <div class="form-group text-right mb-0">
                                        <label class="my-2" for="contact_pref"><b>:نام</b></label>
                                        <input type="text" name="name" id="name" maxlength="50"
                                            class="form-control @error('name') border border-danger @enderror"
                                            value="{{ $user->name }}">
                                    </div>
                                    {{-- phone --}}
                                    <div class="form-group text-right mb-0">
                                        <label class="my-2" for="contact_pref"><b>:موبایل</b></label>
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
                                    <div class="form-group text-right mb-0">
                                        <label class="my-2" for="address"><b>:ادرس</b></label>
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
                                    <div class="text-center mt-3">
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
</section>
@endsection
