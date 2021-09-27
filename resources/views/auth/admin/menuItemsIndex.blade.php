@extends('layouts.app')
@section('content')


    <main id="main">
        <div class="row justify-content-center py-5 w-100 mx-auto">
            <h1 class="text_yellow">پنل ادمین</h1>
        </div>
        <div class="row justify-content-center pb-5 w-100 mx-auto">
            <p class="">ویرایش منو</p>
        </div>
        <div class=" row justify-content-center pb-5 w-100
                mx-auto">
                <a href="{{ route('admin.index') }}">بازگشت به صفحه اصلی</a>
        </div>
        <div class="row justify-content-center pb-5 w-100 mx-auto" id="admin-panel">
            <div class="col-12">
                {{--add new menu items status --}}
                @if (session('status'))
                    @if (session('status') == '')
                        <div class="text-center text-success mt-2">
                            {{ session('status') }}
                        </div>
                    @endif
                @endif
            </div>
            <div class="col-12">
                    {{-- choose menu part --}}
                <div class="row justify-content-center">
                    <label for="cars">نوع ایتم غذایی:</label>

                    <select name="cars" id="cars">
                        <option value="">همه</option>
                        @foreach ($menus as $menu)
                            <option value="{{$menu->id}}">{{$menu->name_fa}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            {{-- add new menu items form --}}
            <div class="col-sm-10 col-md-8 col-lg-6 ">
                <div class="heading-title">
                    <div class=" flex justify-center">
                        <div class=" w-6/12 bg-white p-6 rounded-lg">
                            <div class="block text-center">
                                {{-- edit user details --}}
                                <form class="text-left clearfix" action="{{}}" method="POST">
                                    @csrf
                                    {{-- name --}}
                                    <div class="form-group text-left mb-0">
                                        <label class="mt-2 mb-0" for="contact_pref"><b>نام:</b></label>
                                        <input type="text" name="name" id="name" maxlength="50"
                                            class="form-control @error('name') border border-danger @enderror"
                                            value="">
                                    </div>
                                    {{-- phone --}}
                                    <div class="form-group text-left mb-0">
                                        <label class="mt-2 mb-0" for="contact_pref"><b>تلفن:</b></label>
                                        <input type="text" name="phone" id="phone" maxlength="11"
                                            class="form-control  @error('phone') border border-danger @enderror"
                                            value="">
                                        @error('phone')
                                            <div class=" text-danger mt-2">
                                                *تلفن ۱۱ رقم و به اعداد انگلیسی باشد
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- address --}}
                                    <div class="form-group text-left mb-0">
                                        <label class="mt-2 mb-0" for="address"><b>ادرس:</b></label>
                                        <input type="text" name="address" id="address" maxlength="150"
                                            class="form-control  @error('address') border border-danger @enderror"
                                            value="">
                                        @error('address')
                                            <div class=" text-danger">
                                                *لطفا اطلاعات ادرس را به درستی وارد کنید
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- user id --}}
                                    <input type="hidden" name="user_id" value="">
                                    <div class="text-center my-2">
                                        <button type="submit" class="btn btn-primary">ذخیره</button>
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
