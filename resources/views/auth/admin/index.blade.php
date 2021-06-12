@extends('layouts.app')
@section('content')

      <main id="main">
        <div class="row">
            <div class="col-md-2">
                <div id="accordion">
                    <div class="card">
                    {{-- database menu --}}
                      <div class="card-header">
                          <a class="" data-toggle="collapse" data-target="#databaseHeading" aria-expanded="true" aria-controls="collapseOne">
                           Database
                          </a>
                      </div>
                      <div id="databaseHeading" class="collapse" aria-labelledby="databaseHeading" data-parent="#accordion">
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

            <div class="col-md-8">
                {{-- users list --}}
                <div class="collapse" id="userDatabaseCollapse">
                    <div class="card card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">City</th>
                                <th scope="col">State</th>
                                <th scope="col">Country</th>
                                <th scope="col">Postal code</th>
                                <th scope="col">Role</th>
                                <th scope="col">Email verified @</th>
                                <th scope="col">Created @</th>
                                <th scope="col">Updated @</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">1</th>
                                <td>{{$users[0]->name}}</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                </tr>
                                <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                </tr>
                                <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
      </main>

    {{-- modals --}}

    {{-- show database modal --}}
      <div class='modal fade show' style="d-block" id="ShowUserModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- edit user personal details -->
                    <div class="col-12">
                        <div class="heading-title">
                            <div class=" flex justify-center">
                                <div class=" w-6/12 bg-white p-6 rounded-lg">
                                    <div class="block text-center">
                                    {{-- edit user details --}}
                                        <form class="text-left clearfix" action="" method="POST">
                                            @csrf
                                            <div class="form-group text-left">
                                                <label for="contact_pref"><b>Name:</b></label>
                                                <input type="text" name="name" id="name" maxlength="50"
                                                class="form-control @error('name') border border-danger @enderror" 
                                                placeholder="Your name" value="{{auth()->user()->name}}">
                                                @error('name')
                                                    <div class=" text-danger mt-2">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group text-left">
                                                <label for="contact_pref"><b>Phone:</b></label>
                                                <input type="text" name="phone" id="phone" maxlength="11" 
                                                class="form-control  @error('phone') border border-danger @enderror" 
                                                placeholder="Your phone" value="{{auth()->user()->phone}}">
                                                @error('phone')
                                                    <div class=" text-danger mt-2">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group text-left">
                                                @if ($errors->any())
                                                    <script src="{{mix ('js/app.js')}}"></script>
                                                @endif
                                                <label for="contact_pref"><b>Contact preference:</b></label>
                                                <select name="contact_pref" id="contact_pref" 
                                                 class="w-100 mb-3">
                                                    <option value="0"
                                                        @if ((auth()->user()->contact_pref) == '0')
                                                        selected = "selected"
                                                        @endif
                                                    >Phone</option>
                                                    <option value="1"
                                                        @if ((auth()->user()->contact_pref) == '1')
                                                        selected = "selected"
                                                        @endif>SMS
                                                    </option>
                                                    <option value="2"
                                                        @if ((auth()->user()->contact_pref) == '2')
                                                            selected = "selected"
                                                        @endif>Email
                                                    </option>
                                                </select>                                
                                                @error('contact_pref')
                                                    <div class=" text-danger mt-2">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="text-center">
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

@endsection