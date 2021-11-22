@extends('layouts.app')
@section('content')


    <main id="admin">
        <div class="row justify-content-center py-5 w-100 mx-auto">
            <h1 class="text_yellow">پنل ادمین</h1>
        </div>
        <div class="row justify-content-center pb-5 w-100 mx-auto" >
            <div class="col-md-2 order-1 order-md-2">
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
                                            <a class="" data-toggle="collapse" data-target="#userDatabaseCollapse"
                                                aria-expanded="true" aria-controls="collapseOne">کاربرها</a>
                                        </li>
                                        {{-- menus link --}}
                                        <li>
                                            <a class="" dusk="menu_link" data-toggle="collapse" data-target="#menuDatabaseCollapse"
                                                aria-expanded="true" aria-controls="collapseOne">منو</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10 pr-md-0 order-2 order-md-1">
                {{-- admin creates updates deletes user details --}}
                <div class="">
                    @if (session('status'))
                        @if (str_contains(session('status'), 'کاربر'))
                            <div class="text-center text-danger mt-2">
                                {{ session('status') }}
                            </div>
                        @endif
                    @endif
                    {{-- users list --}}
                    <div class="collapse @error('phone')show @enderror {{ session('users-database-list') == 'open' ? 'show' : '' }}"
                        id="userDatabaseCollapse">
                        <div class="card card-body">
                            <a class="text-right text-danger" data-toggle="collapse" href="#userDatabaseCollapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                            X    
                            </a>
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-right">گزینه ها</th>
                                        <th scope="col" class="text-right">عنوان کاربری</th>
                                        <th scope="col" class="text-right">ایمیبل</th>
                                        <th scope="col" class="text-right">نام</th>
                                        <th scope="col" class="text-right">شماره</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="">
                                            @if ($user->role != 1)
                                                <td class="row justify-content-center pr-0">
                                                    {{-- delete user button --}}
                                                    <form action="{{ route('admin.user.delete') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                        <button dusk="@if ($user->email == 'test@gmail.com')deleteUser_btn @endif" class="py-1 px-2 mx-1"
                                                            type="submit">حذف</button>
                                                    </form>
                                                    {{-- edit user link --}}
                                                    <a dusk="@if ($user->email == 'test@gmail.com')updateUser_Link @endif"
                                                        href="{{ route('admin.user.update.index', $user->id) }}"
                                                        class="py-1 px-2 mx-1">ویرایش</a>
                                                </td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td class="text-right">{{ $user->role == 1 ? 'ادمین' : 'کاربر' }}</td>
                                            <td class="text-right">{{ $user->email }}</td>
                                            <td class="text-right">{{ $user->name }}</td>
                                            <th scope=" row" class="text-right">{{ $user->id }}</th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- admin create updates and deletes menus --}}
                <div class="">
                    @if (session('status'))
                        @if (str_contains(session('status'), 'منوی'))
                            <div class="text-center text-danger mt-2">
                                {{ session('status') }}
                            </div>
                        @endif
                    @endif
                    {{-- menus list --}}
                    <div class="collapse @error('phone')show @enderror {{ session('menu-database-list') == 'open' ? 'show' : '' }}"
                        id="menuDatabaseCollapse">
                        <div class="card card-body">
                            <a class="text-right text-danger" data-toggle="collapse" href="#menuDatabaseCollapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                                X    
                            </a>
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-right">گزینه ها</th>
                                        <th scope="col" class="text-right">تاریخ ایجاد</th>
                                        <th scope="col" class="text-right">تاریخ ویرایش</th>
                                        <th scope="col" class="text-right">نام</th>
                                        <th scope="col" class="text-right">شماره</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $menu)
                                        <tr class="">
                                            <td class="row justify-content-center">
                                                {{-- edit menu button --}}
                                                <a href="{{route('admin.menu-items.index')}}" class="py-1 px-2 mx-1">
                                                    ویرایش
                                                </a>
                                            </td>
                                            <td class="text-right">{{ $menu->created_at }}</td>
                                            <td class="text-right">{{ $menu->updated_at }}</td>
                                            <td class="text-right">{{ $menu->name_fa }}</td>
                                            <th scope="row" class="text-right">{{ $menu->id }}</th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- test link for dusk --}}
                <div class="col-12">
                    <a href="{{route('forgetPassword.index')}}" dusk='changePassword_link' id="changePassword_link">تغییر رمز عبور</a>
                    <a dusk="editMenu_link" href="{{route('admin.menu-items.index')}}" >ویرایش منو</a>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            document.getElementById("admin").scrollIntoView();
        </script>
    
    </main>
@endsection
