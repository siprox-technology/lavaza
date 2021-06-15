@extends('layouts.app')
@section('content')

      <main id="main">
        <div class="row justify-content-center py-5 w-100 mx-auto">
            <h1 class="text_yellow">Admin Panel</h1>
        </div>
        <div class="row justify-content-center pb-5 w-100 mx-auto">
            <div class="col-lg-2 ">
                {{-- main menu --}}
                <div id="accordion">
                    <div class="card">
                    {{-- database menu --}}
                      <div class="card-header">
                          <a class="text-dark" data-toggle="collapse" data-target="#databaseHeading" aria-expanded="true" aria-controls="collapseOne">
                           Database
                          </a>
                      </div>

                      <div id="databaseHeading" class="collapse {{(session('databaseMenu'))=='users'?'show':''}}" aria-labelledby="databaseHeading" data-parent="#accordion">
                        {{-- database tables list --}}
                        <div class="card-body">
                            <ul>
                                {{-- users menu link --}}
                                <li>
                                    <a class="" data-toggle="collapse" data-target="#userDatabaseCollapse" aria-expanded="true" aria-controls="collapseOne">Users</a>
                                </li>
                            </ul>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Collapsible Group Item #2
                          </button>
                        </h5>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Collapsible Group Item #3
                          </button>
                        </h5>
                      </div>
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <div class="col-lg-8 ">
                {{-- users list --}}
                <div class="collapse {{(session('databaseMenu'))=='users'?'show':''}}" id="userDatabaseCollapse">
                    <div class="card card-body">
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{($user->role)==1? "Admin":"User"}}</td>
                                        @if ($user->role != 1)
                                        <td class="row justify-content-center">
                                            {{-- delete user button --}}
                                            <form action="{{route('admin.user.delete')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                                <button class="py-1 px-2 mx-1" type="submit"><i class="icofont-trash"></i></button>
                                            </form>
                                            {{-- edit user button --}}
                                            <button class="py-1 px-2 mx-1" data-toggle="modal" data-target="#editUserModal{{$user->id}}"><i class="icofont-pencil"></i></button>
                                            {{-- edit user modal --}}
                                            <div class='modal fade show' style="d-block" id="editUserModal{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header p-2">
                                                            <label class="mb-0"for="">Update user information</label>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body p-0">
                                                            <!-- edit user personal details -->
                                                            <div class="col-12">
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
                                                                                        @error('name')
                                                                                            <div class=" text-danger mt-2">
                                                                                                {{$message}}
                                                                                            </div>
                                                                                        @enderror
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
                                                                                        @error('address')
                                                                                            <div class=" text-danger mt-2">
                                                                                                {{$message}}
                                                                                            </div>
                                                                                        @enderror
                                                                                    </div>
                                                                                    {{-- city --}}
                                                                                    <div class="form-group text-left mb-0">
                                                                                        <label class="mt-2 mb-0" class="mt-2 mb-0" for="city"><b>City:</b></label>
                                                                                        <input type="text" name="city" id="city" maxlength="50" 
                                                                                        class="form-control  @error('city') border border-danger @enderror" 
                                                                                        value="{{$user->city}}">
                                                                                        @error('city')
                                                                                            <div class=" text-danger mt-2">
                                                                                                {{$message}}
                                                                                            </div>
                                                                                        @enderror
                                                                                    </div>
                                                                                    {{-- state --}}
                                                                                    <div class="form-group text-left mb-0">
                                                                                        <label class="mt-2 mb-0" for="state"><b>State:</b></label>
                                                                                        <input type="text" name="state" id="state" maxlength="30" 
                                                                                        class="form-control  @error('state') border border-danger @enderror" 
                                                                                        value="{{$user->state}}">
                                                                                        @error('state')
                                                                                            <div class=" text-danger mt-2">
                                                                                                {{$message}}
                                                                                            </div>
                                                                                        @enderror
                                                                                    </div>
                                                                                    {{-- country --}}
                                                                                    <div class="form-group text-left mb-0">
                                                                                        <label class="mt-2 mb-0" for="country"><b>Country:</b></label>
                                                                                        <input type="text" name="country" id="country" maxlength="30" 
                                                                                        class="form-control  @error('country') border border-danger @enderror" 
                                                                                        value="{{$user->country}}">
                                                                                        @error('country')
                                                                                            <div class=" text-danger mt-2">
                                                                                                {{$message}}
                                                                                            </div>
                                                                                        @enderror
                                                                                    </div>
                                                                                    {{-- post_code --}}
                                                                                    <div class="form-group text-left mb-0">
                                                                                        <label class="mt-2 mb-0" for="post_code"><b>post_code:</b></label>
                                                                                        <input type="text" name="post_code" id="post_code" maxlength="15" 
                                                                                        class="form-control  @error('post_code') border border-danger @enderror" 
                                                                                        value="{{$user->post_code}}">
                                                                                        @error('post_code')
                                                                                            <div class=" text-danger mt-2">
                                                                                                {{$message}}
                                                                                            </div>
                                                                                        @enderror
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
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
      </main>

    {{-- modals --}}

@endsection
