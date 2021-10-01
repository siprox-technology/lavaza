@extends('layouts.app')
@section('content')


    <main id="menu-items">
        <div class="row justify-content-center py-5 w-100 mx-auto">
            <h1 class="text_yellow">پنل ادمین</h1>
        </div>
        <div class="row justify-content-center pb-5 w-100 mx-auto">
            <p class="">ویرایش ایتم</p>
        </div>
        <div class=" row justify-content-center pb-5 w-100
                mx-auto">
                <a href="{{ route('admin.menu-items.index') }}">بازگشت به صفحه منو</a>
        </div>
        <div class="row justify-content-center pb-5 w-100 mx-auto" id="admin-panel">
            <div class="col-12">
                {{--add new menu items status --}}
                @if (session('status'))
                    @if (str_contains(session('status'), 'ویرایش'))
                        <div class="text-center text-success mt-2">
                            {{ session('status') }}
                        </div>
                    @endif
                @endif
            </div>
            
        <div class="col-12">
        <!-- ======= Menu Section ======= -->
    <section id="menu-item" class="menu">
        <div class="container">
            <div class="col-12 menu-container">
                {{-- update menu item form --}}
                    <div class="row menu-item w-100">
                        <form action="{{route('admin.menu-items.update')}}" method="POST">
                            @csrf
                            <div class="col-lg-8 col-12">
                                {{-- name --}}
                                <div class="form-group">
                                    <input type="text" name="name" dusk="name" id="name" maxlength="128"
                                        class="form-control @error('name') border border-danger @enderror" placeholder="نام لاتین"
                                        value="{{$item[0]->name}}">
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
                                        value="{{$item[0]->name_fa}}">
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
                                        placeholder="مواد تشکیل دهنده" value="{{ $item[0]->ingredients_fa }}">
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
                                        placeholder="قیمت" value="{{ $item[0]->price}}">
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
                                        placeholder="موجودی(تعداد)" value="{{ $item[0]->stock}}">
                                    @error('stock')
                                        <div class=" text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <input type="hidden" name="id" value="{{$item[0]->id}}">
                                <div class="text-center">
                                    <button type="submit">ویرایش</a>
                                </div>
                            </div>
                        </form>

                        <div class="col-lg-4 col-12">
                            <div class="row justify-content-center">
                                <div class="menu-image mt-2">
                                    <img src="{{ asset('images/menu/' . $item[0]->name_fa . '.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12 mb-4">
                                    <div class="row">
                                        {{-- change image --}}
                                        <div class="col-md-12">
                                            <form action="{{route('admin.menu-items.image.update')}}" class="bg-gray p-3"  method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row justify-content-center">
                                                    <div class="col-12">
                                                    <label class="custom-file-upload">
                                                        <input type="file" name="image"/>
                                                        انتخاب عکس
                                                    </label>
                                                    </div>
                                                    <input type="hidden" value="{{$item[0]->id}}" name="id">
                                                    <div class="col-12 mt-2 ">
                                                        <button type="submit" class="py-2 px-3 border-0 btn-primary">ذخیره</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section><!-- End Menu Section -->
            </div>

        </div>
    </main>

    {{-- scroll to admin panel --}}
    <script type="text/javascript">
        document.getElementById("menu-item").scrollIntoView();
    </script>
@endsection
