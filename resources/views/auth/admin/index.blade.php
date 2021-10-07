@extends('layouts.app')
@section('content')


    <main id="main">
        <div class="row justify-content-center py-5 w-100 mx-auto">
            <h1 class="text_yellow">پنل ادمین</h1>
        </div>
        <div class="row justify-content-center pb-5 w-100 mx-auto" id="admin-panel">
            <div class="col-12 ">
                {{-- main menu --}}
                <div id="accordion">
                    <div class="card">
                        {{-- database menu --}}
                        <div class="card-header">
                            <a class="text-dark" dusk="AdminDbMenuLink" data-toggle="collapse"
                                data-target="#databaseHeading" aria-expanded="true" aria-controls="collapseOne">
                                اطلاعات سیستم
                            </a>
                        </div>

                        <div id="databaseHeading"
                            class="collapse @error('phone')show @enderror
                      {{ session('users-database-list') == 'open' ? 'show' : '' }}"
                            aria-labelledby="databaseHeading" data-parent="#accordion">
                            {{-- database tables list --}}
                            <div class="card-body">
                                <ul>
                                    {{-- users link --}}
                                    <li>
                                        <a class="" data-toggle="collapse" data-target="#userDatabaseCollapse"
                                            aria-expanded="true" aria-controls="collapseOne">کاربرها</a>
                                    </li>
                                    {{-- menus link --}}
                                    <li>
                                        <a class="" data-toggle="collapse" data-target="#menuDatabaseCollapse"
                                            aria-expanded="true" aria-controls="collapseOne">منو</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    Collapsible Group Item #2
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                                beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                                lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                                probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree">
                                    Collapsible Group Item #3
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                                beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                                lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                                probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- admin creates updates deletes user details --}}
            <div class="col-12 ">
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
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">شماره</th>
                                    <th scope="col">نام</th>
                                    <th scope="col">ایمیبل</th>
                                    <th scope="col">عنوان کاربری</th>
                                    <th scope="col">گزینه ها</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="">
                                        <th scope=" row">
                                        {{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role == 1 ? 'ادمین' : 'کاربر' }}</td>
                                        @if ($user->role != 1)
                                            <td class="row justify-content-center">
                                                {{-- delete user button --}}
                                                <form action="{{ route('admin.user.delete') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                    <button dusk="@if ($user->email == 'test@gmail.com')deleteUser_btn @endif" class="py-1 px-2 mx-1"
                                                        type="submit"><i class="icofont-trash"></i></button>
                                                </form>
                                                {{-- edit user link --}}
                                                <a dusk="@if ($user->email == 'test@gmail.com')updateUse_Link @endif"
                                                    href="{{ route('admin.user.update.index', $user->id) }}"
                                                    class="py-1 px-2 mx-1"><i class="icofont-pencil"></i></button>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- admin create updates and deletes menus --}}
            <div class="col-12 ">
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
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">شماره</th>
                                    <th scope="col">نام</th>
                                    <th scope="col">تاریخ</th>
                                    <th scope="col">تاریخ ویرایش</th>
                                    <th scope="col">گزینه ها</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                    <tr class="">
                                        <th scope=" row">
                                        {{ $menu->id }}</th>
                                        <td>{{ $menu->name_fa }}</td>
                                        <td>{{ $menu->created_at }}</td>
                                        <td>{{ $menu->updated_at }}</td>
                                        <td class="row justify-content-center">
                                            {{-- edit menu button --}}
                                        <a dusk="editMenu_link" href="{{route('admin.menu-items.index')}}" class="py-1 px-2 mx-1"
                                            type="submit"><i class="icofont-pencil"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <a href="{{route('forgetPassword.index')}}">تغییر رمز عبور</a>
        </div>
    </main>

    {{-- modals --}}
    <script type="text/javascript">
        document.getElementById("admin-panel").scrollIntoView();
    </script>
@endsection
