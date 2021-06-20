@extends('layouts.app')
@section('content')


      <main id="main">
        <div class="row justify-content-center py-5 w-100 mx-auto">
            <h1 class="text_yellow">Admin Panel</h1>
        </div>
        <div class="row justify-content-center pb-5 w-100 mx-auto">
            <p class="">Update user details</p>
        </div>
        <div class="row justify-content-center pb-5 w-100 mx-auto">
            <a href="{{route('admin.index')}}">Back to panel</a>
        </div>
        <div class="row justify-content-center pb-5 w-100 mx-auto" id="admin-panel">
            <div class="col-12">
                {{-- update user status --}}
                @if (session('status'))
                    @if (session('status')=='User updated')
                        <div class="text-center text-success mt-2">
                            {{session('status')}}
                        </div>
                    @endif   
                @endif
            </div>
            {{-- update user form --}}
            <div class="col-sm-10 col-md-8 col-lg-6 ">
                <div class="heading-title">
                    <div class=" flex justify-center">
                        <div class=" w-6/12 bg-white p-6 rounded-lg">
                            <div class="block text-center">
                            {{-- edit user details --}}
                                <form class="text-left clearfix" action="{{route('admin.user.update')}}" method="POST">
                                    @csrf
                                    {{-- name --}}
                                    <div class="form-group text-left mb-0">
                                        <label class="mt-2 mb-0" for="contact_pref"><b>Name:</b></label>
                                        <input type="text" name="name" id="name" maxlength="50"
                                        class="form-control @error('name') border border-danger @enderror" 
                                        value="{{$user->name}}">
                                    </div>
                                    {{-- phone --}}
                                    <div class="form-group text-left mb-0">
                                        <label class="mt-2 mb-0" for="contact_pref"><b>Phone:</b></label>
                                        <input type="text" name="phone" id="phone" maxlength="11" 
                                        class="form-control  @error('phone') border border-danger @enderror" 
                                        value="{{$user->phone}}">
                                        @error('phone')
                                            <div class=" text-danger mt-2">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- address --}}
                                    <div class="form-group text-left mb-0">
                                        <label class="mt-2 mb-0" for="address"><b>Address:</b></label>
                                        <input type="text" name="address" id="address" maxlength="150" 
                                        class="form-control  @error('address') border border-danger @enderror" 
                                        value="{{$user->address}}">
                                    </div>
                                    {{-- city --}}
                                    <div class="form-group text-left mb-0">
                                        <label class="mt-2 mb-0" class="mt-2 mb-0" for="city"><b>City:</b></label>
                                        <input type="text" name="city" id="city" maxlength="50" 
                                        class="form-control  @error('city') border border-danger @enderror" 
                                        value="{{$user->city}}">

                                    </div>
                                    {{-- state --}}
                                    <div class="form-group text-left mb-0">
                                        <label class="mt-2 mb-0" for="state"><b>State:</b></label>
                                        <input type="text" name="state" id="state" maxlength="30" 
                                        class="form-control  @error('state') border border-danger @enderror" 
                                        value="{{$user->state}}">
                                    </div>
                                    {{-- country --}}
                                    <div class="form-group text-left mb-0">
                                        <label class="mt-2 mb-0" for="country"><b>Country:</b></label>
                                        <input type="text" name="country" id="country" maxlength="30" 
                                        class="form-control  @error('country') border border-danger @enderror" 
                                        value="{{$user->country}}">
                                    </div>
                                    {{-- post_code --}}
                                    <div class="form-group text-left mb-0">
                                        <label class="mt-2 mb-0" for="post_code"><b>post_code:</b></label>
                                        <input type="text" name="post_code" id="post_code" maxlength="15" 
                                        class="form-control  @error('post_code') border border-danger @enderror" 
                                        value="{{$user->post_code}}">
                                    </div>
                                    {{-- user id --}}
                                    <input type="hidden" name="user_id" value="{{$user->id}}">  
                                    <div class="text-center my-2">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </main>

    {{-- modals --}}
    <script type="text/javascript">
        document.getElementById("admin-panel").scrollIntoView();
    </script>
@endsection
