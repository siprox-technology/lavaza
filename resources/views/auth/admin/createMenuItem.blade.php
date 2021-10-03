@extends('layouts.app')
@section('content')

                        {{-- new item form --}}
                        <div class="row menu-item w-100 filter-newItem" id="new-menu-item">
                            <div class="row justify-content-center py-5 w-100 mx-auto">
                                <h1 class="text_yellow">پنل ادمین</h1>
                            </div>
                            <div class="row justify-content-center pb-5 w-100 mx-auto">
                                <p class="">ذخیره ایتم جدید</p>
                            </div>
                            <div class=" row justify-content-center pb-5 w-100
                                    mx-auto">
                                    <a href="{{ route('admin.menu-items.index') }}">بازگشت به صفحه منو</a>
                            </div>
                            <div class="col-12">
                                {{--add new menu items status --}}
                                @if (session('status'))
                                    @if (session('status') == 'ایتم جدید اضافه شد')
                                        <div class="text-center text-success mt-2">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    @if (str_contains(session('status'), 'امکان اضافه کردن ایتم جدید وجود ندارد'))
                                        <div class="text-center text-danger mt-2">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                @endif
                            </div>
                            
                            <div class="col-lg-8 col-12">
                                <form class="text-left clearfix" action="{{route('admin.menu-items.store')}}" method="post">
                                    @csrf
                                    {{-- menu name --}}
                                    <div class="form-group">
                                        <select name="menu_name" dusk="menuName_select" id="" class="form-control @error('name') border border-danger @enderror">
                                            <option default>انتخاب نوع غذا</option>
                                            <option value="Starter">اسنارتر</option>
                                            <option value="Side">ساید</option>
                                            <option value="Drinks">نوشیدنی ها</option>
                                            <option value="Main">غذای اصلی</option>
                                        </select>
                                        @error('menu_name')
                                            <div class=" text-danger mt-2">
                                            لطفا نوع غذا را انتخاب کنید 
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- name --}}
                                    <div class="form-group">
                                        <input type="text" name="name" dusk="name" id="name" maxlength="128"
                                            class="form-control @error('name') border border-danger @enderror" placeholder="نام لاتین"
                                            value="{{old('name')}}">
                                        @error('name')
                                            <div class=" text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- name_fa --}}
                                    <div class="form-group">
                                        <input type="text" name="name_fa" dusk="name_fa" dusk="name_fa" id="name_fa" maxlength="128"
                                            class="form-control @error('name_fa') border border-danger @enderror" placeholder="نام"
                                            value="{{old('name_fa')}}">
                                        @error('name_fa')
                                            <div class=" text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- ingredients_fa --}}
                                    <div class="form-group">
                                        <input type="text" name="ingredients_fa" dusk="ingredients_fa" id="ingredients_fa" maxlength="512"
                                            class="form-control @error('ingredients_fa') border border-danger @enderror"
                                            placeholder="مواد تشکیل دهنده" value="{{old('ingredients_fa')}}">
                                        @error('ingredients_fa')
                                            <div class=" text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- price --}}
                                    <div class="form-group">
                                        <input type="text" name="price" dusk="price" id="price" maxlength="8"
                                            class="form-control  @error('price') border border-danger @enderror"
                                            placeholder="قیمت" value="{{old('price')}}">
                                        @error('price')
                                            <div class=" text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- stock --}}
                                    <div class="form-group">
                                        <input type="stock" name="stock" dusk="stock" id="stock" maxlength="4"
                                            class="form-control @error('stock') border border-danger @enderror"
                                            placeholder="موجودی(تعداد)" value="{{old('stock')}}">
                                        @error('stock')
                                            <div class=" text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" dusk="submit_btn" dusk="RegisterSubmitBtn">ذخیره ایتم جدید</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                            {{-- scroll to admin panel --}}
    <script type="text/javascript">
        document.getElementById("new-menu-item").scrollIntoView();
    </script>
@endsection