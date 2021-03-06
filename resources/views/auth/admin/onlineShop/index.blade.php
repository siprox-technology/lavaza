@extends('layouts.app')
@section('content')
    <main id="onlineShop">
        <!-- ======= admin Section ======= -->
        <section>
            <div class="row justify-content-center py-3 w-100 mx-auto">
                <h3 class="">فروشگاه آنلاین</h3>
            </div>
            <div class="row justify-content-center pb-3 w-100 mx-auto">
                <a href="{{route('admin.index')}}">بازگشت به ادمین</a>
            </div>
            <div class="container-fluid">
                <div class="col-12">
                    {{-- update onlineShop status --}}
                    @if (session('status'))
                        @if (session('status') == 'وضعیت فروشگاه بروز رسانی شد')
                            <div class="text-center text-success my-2">
                                {{ session('status') }}
                            </div>
                        @endif
                    @endif
                </div>
                <div class="row mx-auto w-100 justify-content-center">
                    <div class="col-lg-5 col-md-7 col-sm-9 d-flex flex-column justify-content-center align-items-stretch border border-warning rounded p-3">
                        <div class="card text-right">
                             {{-- system menu --}}
                            <div class="card-header">
                                <p class="text-dark">
                                    تنظیمات فروش آنلاین
                                </p>
                            </div>

                            <div class="card-body">
                                <form action="{{route('onlineShop.update')}}" class="d-flex flex-column text-center" method="POST">
                                    @csrf
                                    {{-- open or close --}}
                                    <p><b>وضعیت فروشگاه</b></p>
                                    <div class="row mx-auto">
                                        <label class="switch">
                                            <input type="checkbox" id="is_open_toggle" {{($onlineShopSetting->is_open)==true? 'checked':''}} >
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="is_open" id="is_open_input" value="{{$onlineShopSetting->is_open}}">
                                    <p id="is_open_status" class="{{($onlineShopSetting->is_open)==true? 'text-success':'text-danger'}}">{{($onlineShopSetting->is_open)==true? 'باز':'بسته'}}</p>
                                    <div class="col-6 mx-auto">
                                        <button class="mt-3" type="submit">ذخیره</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-header">
                                <p class="text-dark">
                                    سفارشات
                                </p>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li class="border-top border-gray">
                                        <a href="{{route('onlineShop.orders.index')}}">سفارشات ۲۴ ساعت گذشته</a>
                                    </li>
                                    <li class="border-top border-gray">
                                        <a href="{{route('onlineShop.orders.history.index')}}">سابقه سفارشات</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            document.getElementById("onlineShop").scrollIntoView();
        </script>    
    </main>
@endsection
