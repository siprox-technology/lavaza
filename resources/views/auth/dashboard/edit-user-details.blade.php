@extends('layouts.app')
@section('content')


    <main id="main">
        <div class="row justify-content-center py-3 w-100 mx-auto">
            <h3 class="">ویرایش اطلاعات کاربر</h3>
        </div>
        <div class="row justify-content-center pb-3 w-100 mx-auto">
            <a href="{{ route('dashboard.index') }}">بازگشت به منوی اصلی</a>
        </div>
        <div class="row justify-content-center w-100 mx-auto" id="admin-panel">
            <div class="col-12">
                {{-- update user status --}}
                @if (session('status'))
                    @if (session('status') == 'جزییات کاربر ویرایش شد')
                        <div class="text-center text-success mb-3">
                            {{ session('status') }}
                        </div>
                    @endif
                @endif
            </div>
            {{-- update user form --}}
            <div class="col-lg-5 col-md-7 col-sm-9 border border-warning rounded p-3 my-5">
                <div class="heading-title">
                    <div class=" flex justify-center">
                        <div class=" w-6/12 bg-white p-6 rounded-lg">
                            <div class="block text-center">
                                {{-- edit user details --}}
                                <form class="text-left clearfix" action="{{route('dashboard.user.update')}}" method="POST">
                                    @csrf
                                    {{-- name --}}
                                    <div class="form-group text-right mb-1">
                                        <label class="mt-2 mb-1" for="contact_pref">: نام</label>
                                        <input type="text" dusk="name_input" name="name" id="name" maxlength="50"
                                            class="form-control @error('name') border border-danger @enderror"
                                            value="{{ auth()->user()->name }}">
                                    </div>
                                    @error('name')
                                        <div class="text-right text-danger mt-2">
                                            نام را با حروف فارسی وارد کنید
                                        </div>
                                    @enderror
                                    {{-- phone --}}
                                    <div class="form-group text-right mb-1">
                                        <label class="mt-2 mb-1" for="contact_pref">: تلفن</label>
                                        <input type="text" dusk="phone_input" name="phone" id="phone" maxlength="11"
                                            class="form-control  @error('phone') border border-danger @enderror"
                                            value="{{ auth()->user()->phone }}">
                                        @error('phone')
                                            <div class=" text-danger mt-2">
                                                تلفن ۱۱ رقم و به اعداد انگلیسی باشد
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- address --}}
                                    <div class="form-group text-right mb-1">
                                        <label class="mt-2 mb-1" for="address">: ادرس</label>
                                        <input type="text" dusk="address_input" name="address" id="address" maxlength="150"
                                            class="form-control  @error('address') border border-danger @enderror"
                                            value="{{ auth()->user()->address }}">
                                        @error('address')
                                            <div class=" text-danger">
                                                *لطفا اطلاعات ادرس را به درستی وارد کنید
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- user id --}}
                                    {{-- <input type="hidden" name="user_id" value="{{$user->id}}"> --}}
                                    <div class="text-center my-2">
                                        <button type="submit" dusk="update_btn" class="btn btn-primary">Update</button>
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
