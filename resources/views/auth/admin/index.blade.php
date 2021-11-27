@extends('layouts.app')
@section('content')


    <main id="admin">
        <div class="row justify-content-center py-5 w-100 mx-auto">
            <h1 class="text_yellow">پنل ادمین</h1>
        </div>
        <div class="row justify-content-center pb-5 w-100 mx-auto" >
            <div class="col-lg-5 col-md-7 col-sm-9 ">
                <div class="text-right">
                    {{-- main menu --}}
                    <div id="accordion">
                        <div class="card">
                            {{-- database menu --}}
                            <div class="card-header">
                                <p class="text-dark">
                                    اطلاعات سیستم
                                </p>
                            </div>
    
                            <div id="databaseHeading"
                                class="collapse show "
                                aria-labelledby="databaseHeading" data-parent="#accordion">
                                {{-- database tables list --}}
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
            </div>

            {{-- test link for dusk --}}
            <div class="col-12">

            </div>
        </div>
        <script type="text/javascript">
            document.getElementById("admin").scrollIntoView();
        </script>
    
    </main>
@endsection
