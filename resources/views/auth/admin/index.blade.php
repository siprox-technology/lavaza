@extends('layouts.app')
@section('content')
    <main id="admin">
        <!-- ======= admin Section ======= -->
        <section  id="admin">
            <div class="row justify-content-center py-3 w-100 mx-auto">
                <h3 class="">پنل ادمین</h3>
            </div>
            <div class="container-fluid">
                <div class="row mx-auto w-100 justify-content-center">
                    <div class="col-lg-5 col-md-7 col-sm-9 d-flex flex-column justify-content-center align-items-stretch border border-warning rounded p-3">
                        <div class="card text-right">
                             {{-- system menu --}}
                            <div class="card-header">
                                <p class="text-dark">
                                    اطلاعات سیستم
                                </p>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    {{-- users link --}}
                                    <li>
                                        <a class="" href="{{route('admin.users.index')}}">کاربرها</a>
                                    </li>
                                    {{-- menus link --}}
                                    <li>
                                        <a class="" href="{{route('admin.menu.index')}}" dusk="menu_link">منو</a>
                                    </li>
                                </ul>
                            </div>

                            {{-- admin menu --}}
                            <div class="card-header">
                                <p class="text-dark">
                                    اطلاعات ادمین
                                </p>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    {{-- chenge password --}}
                                    <li>
                                        <a href="{{route('forgetPassword.index')}}" dusk='changePassword_link' id="changePassword_link">تغییر رمز عبور</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                document.getElementById("admin").scrollIntoView();
            </script>
        </section>    
    </main>
@endsection
