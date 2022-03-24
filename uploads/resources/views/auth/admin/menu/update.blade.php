@extends('layouts.app')
@section('content')


    <section id="menu-item" class="menu">
        <main>
            <div class="row justify-content-center py-3 w-100 mx-auto">
                <h3 class="">ویرایش ایتم</h3>
            </div>
            <div class="row justify-content-center w-100 mx-auto">
                <a href="{{ route('admin.menu.index') }}">بازگشت به لیست منو</a>
            </div>
            <div class="row justify-content-center pb-5 w-100 mx-auto" id="admin-panel">
                <div class="col-12">
                    {{--add new menu items status --}}
                    @if (session('status'))
                        @if (str_contains(session('status'), 'ویرایش'))
                            <div class="text-center text-success mt-2">
                                {{session('status')}}
                            </div>
                        @endif
                    @endif
                </div>
            </div>
            <!-- ======= Menu Section ======= -->
            <div class="container">
                <div class="col-12 menu-container">
                    {{-- update menu item form --}}
                        <div class="row justify-content-center menu-item w-100 mb-3">
                            {{-- item information --}}
                            <div class="col-md-6 p-3 border border-warning rounded">
                                <form action="{{route('admin.menu.items.update')}}" method="POST">
                                    @csrf
                                    {{-- name --}}
                                    <div class="form-group">
                                        <input type="text" name="name" dusk="name" id="name" maxlength="128"
                                            class="form-control @error('name') border border-danger @enderror" placeholder="نام لاتین"
                                            value="{{$item->name}}">
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
                                            value="{{$item->name_fa}}">
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
                                            placeholder="مواد تشکیل دهنده" value="{{ $item->ingredients_fa }}">
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
                                            placeholder="قیمت" value="{{ $item->price}}">
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
                                            placeholder="موجودی(تعداد)" value="{{ $item->stock}}">
                                        @error('stock')
                                            <div class=" text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <div class="text-center">
                                        <button type="submit" dusk="submit_btn">ویرایش</a>
                                    </div>
                                </form>
                            </div>
                            {{-- image --}}
                            <div class="col-md-3">
                                <div class=" d-flex flex-column">
                                    <div class="menu-image mx-auto mt-2 mt-sm-0">
                                        <img src="@if (file_exists('images/menu/' . $item->name_fa . '.jpg'))
                                        {{ asset('images/menu/' . $item->name_fa . '.jpg') }}
                                        @else
                                        {{ asset('images/menu/ایتم جدید.jpg') }}
                                        @endif " alt="">
                                    </div>
                                    <form action="{{ route('admin.menu.items.image.update') }}" class="bg-gray p-3" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row justify-content-center">
                                            <label class="custom-file-upload mr-2">
                                                <input type="file" name="image" id="item_image_to_upload" name="item_image_to_upload" />
                                                انتخاب عکس
                                            </label>
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" class="py-2 px-3 mt-1 border-0 btn-primary">ذخیره</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
    {{-- scroll to admin panel --}}
    <script type="text/javascript">
        document.getElementById("menu-item").scrollIntoView();
    </script>
@endsection
