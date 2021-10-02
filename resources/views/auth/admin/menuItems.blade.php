@extends('layouts.app')
@section('content')


    <main id="menu-items">
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
                    @if (session('status') == 'ایتم مورد نظر حذف شد')
                        <div class="text-center text-danger mt-2">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (str_contains(session('status'), 'ویرایش'))
                        <div class="text-center text-success mt-2">
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
                        <ul id="menu-flters">
                            <li data-filter="*" class="">همه</li>
                            <li> <a href="{{route('admin.menu-items.store.index')}}"> ایتم جدید</a></li>
                            @foreach ($menus as $menu)
                                <li data-filter={{ '.filter-' . $menu->name_fa}}>{{ $menu->name_fa }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-12 menu-container">
                    {{-- menu items --}}
                    @foreach ($items as $item)
                        <div class="row menu-item w-100 {{ 'filter-' . $item->menu->name_fa }}" id="{{$item->name_fa}}">
                            <div class="col-lg-8 col-12">
                                {{-- menu item details --}}
                                <ul>
                                    <li>{{$item->name}}</li>
                                    <li>{{$item->name_fa}}</li>
                                    <li>{{$item->ingredients_fa}}</li>
                                    <li>{{$item->price}}</li>
                                    <li>{{$item->stock}}</li>
                                </ul>
                                <div class="text-center">
                                        <a href="{{route('admin.menu-items.update.index',$item->name_fa)}}">ویرایش</a>
                                </div>

                                {{-- delete --}}
                                <form action="{{route('admin.menu-items.delete')}}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$item->id}}" name="id">
                                    <button type="submit">حذف</button>
                                </form>
                            </div>
                            {{-- image--}}
                            <div class="col-lg-4 col-12">
                                <div class="row justify-content-center">
                                    <div class="menu-image mt-2">
                                        <img src="
                                            @if(file_exists(public_path('images/menu/'.$item->name_fa .'.jpg')))
                                                {{asset('images/menu/'.$item->name_fa .'.jpg')}}
                                            @else
                                                {{asset('images/menu/ایتم جدید.jpg')}}
                                            @endif
                                            " alt="">
                                    </div>
                                    <form action="{{ route('admin.menu-items.image.update') }}" class="bg-gray p-3" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row justify-content-center">
                                            <label class="custom-file-upload">
                                                <input type="file" name="image"/>
                                                انتخاب عکس
                                            </label>
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <div class="col-sm-6 mt-2 mt-sm-0 ml-3 ml-sm-0 dashboard-menu">
                                                <button type="submit" class="py-2 px-3 border-0 btn-primary">ذخیره</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Menu Section -->
            </div>

        </div>
    </main>

    {{-- scroll to admin panel --}}
    <script type="text/javascript">
        document.getElementById("menu-items").scrollIntoView();
    </script>
@endsection
