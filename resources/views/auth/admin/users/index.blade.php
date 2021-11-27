@extends('layouts.app')
@section('content')
<main id="users">

   <div class="row justify-content-center py-3 w-100 mx-auto">
      <h3 class="">لیست کاربر ها</h3>
  </div>

  <div class="row justify-content-center pb-3 w-100 mx-auto">
      <a href="{{route('admin.index')}}">بازگشت به منوی اصلی</a>
 </div>
   @if (session('status'))
      @if (str_contains(session('status'), 'کاربر'))
         <div class="text-center text-danger mt-2">
               {{ session('status') }}
         </div>
      @endif
   @endif
   <div class="">
      {{-- admin creates updates deletes user details --}}
      <div class="">
          {{-- users list --}}
          <div>
              <div class="card card-body">
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
                                              href="{{ route('admin.user.update.index', $user->name) }}"
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
  </div>


   <script type="text/javascript">
       document.getElementById("users").scrollIntoView();
   </script>

</main>

@endsection