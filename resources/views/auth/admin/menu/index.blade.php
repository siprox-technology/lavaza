@extends('layouts.app')
@section('content')
    <main id="menu-items">
        <section>
            <div class="row justify-content-center py-3 w-100 mx-auto">
                <h3 class="">لیست منو</h3>
            </div>
            <div class="row justify-content-center w-100 mx-auto">
                <a href="{{ route('admin.index') }}">بازگشت به صفحه اصلی</a>
            </div>
            <div class="row justify-content-center pb-5 w-100 mx-auto" id="admin-panel">
                <div class="col-12">
                    {{-- add new menu items status --}}
                    @if (session('status'))
                        @if (str_contains(session('status'),'حذف شد'))
                            <div class="text-center text-danger mt-2">
                                {{ session('status') }}
                            </div>
                        @endif
                    @endif
                </div>
                {{-- menu items forms --}}
                <div class="col-12">
                    <!-- ======= Menu Section ======= -->
                    <section id="menu" class="menu">
                        <div class="container">
                            {{-- differnt menus i.e. Starter Main .... --}}
                            <div class="row">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <ul id="menu-filters">
                                        <li data-filter="*" class="filter-active">همه</li>
                                        <li> <a dusk="newItem_link" href="{{ route('admin.menu.items.create.index') }}"> ایتم
                                                جدید</a></li>
                                        @foreach ($menus as $menu)
                                            <li data-filter={{ '.filter-' . $menu->name_fa }}>{{ $menu->name_fa }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
    
                            <div class="col-12 menu-container">
                                {{-- menu items --}}
                                @foreach ($items as $item)
                                    <div class="row menu-item w-100 mb-2 {{ 'filter-' . $item->menu->name_fa }}"
                                        id="{{ $item->name_fa }}">
                                        {{-- item information --}}
                                        <div class="col-lg-8 col-12 border border-warning rounded">
                                            {{-- menu item details --}}
                                            <div class="content text-right">
                                                {{-- name --}}
                                                <p class="mb-0">: نام</p>
                                                <p class="mb-0 text_yellow">{{ $item->name }}</p>
                                                {{-- Email --}}
                                                <p class="mb-0">: نام فارسی</p>
                                                <p class="mb-0 text_yellow">{{ $item->name_fa }}</p>
                                                {{-- phone --}}
                                                <p class="mb-0">: مواد تشکیل دهنده</p>
                                                <p class="mb-0 text_yellow">{{ $item->ingredients_fa }}</p>
                                                {{-- account status --}}
                                                <p class="mb-0">: قیمت</p>
                                                <p class="mb-0 text_yellow">{{ $item->price }}</p>
                                                {{-- Address --}}
                                                <p class="mb-0">: موجودی</p>
                                                <p class="mb-0 text_yellow">{{($item->stock)==null? 'نامعلوم': $item->stock }}</p>
                                            </div>
                                            <form action="{{ route('admin.menu.items.delete') }}" class="row justify-content-between px-3 my-3" method="POST">
                                            {{--update and delete  --}}
                                                @csrf
                                                <input type="hidden" value="{{ $item->id }}" name="id">
                                                <button dusk="@if ($item->name == 'test changed')deleteItem_btn @endif" class="btn btn-danger" type="submit">حذف</button>
                                                 <a dusk="@if ($item->name == 'test food')editItem_link @endif"
                                                    href="{{ route('admin.menu.update.index', $item->name_fa) }}" class="button_yellow">ویرایش</a>
                                            </form>
                                        </div>
                                        {{-- image --}}
                                        <div class="col-lg-4 col-12">
                                            <div class=" d-flex flex-column">
                                                <div class="menu-image mx-auto mt-2">
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
                                                        <input type="hidden" name="id value="{{ $item->id }}">
                                                        <button type="submit" class="py-2 px-3 border-0 btn-primary">ذخیره</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
                </div>
            </div>
            <script type="text/javascript">
                document.getElementById("menu-items").scrollIntoView();
            </script>
        </section>
    </main>
@endsection