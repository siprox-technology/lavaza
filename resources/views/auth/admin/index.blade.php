@extends('layouts.app')
@section('content')


    
      <main id="main">
          <div class="container">
              <div class="row">
                  <div class="col-md-3">
                    <nav class="nav-menu ">
                        <ul>
                            <li><a href="index.html" class="text_yellow">Users</a></li>
                            <a class="bg-primary text-white p-3" data-toggle="modal"
                            data-target="#ShowUserModal">Edit
                            details</a>
                            <li><a class="text_yellow" href="#about">About</a></li>
                            <li><a class="text_yellow" href="#menu">Menu</a></li>
                            <li><a class="text_yellow" href="#specials">Specials</a></li>
                            <li><a class="text_yellow" href="#events">Events</a></li>
                            <li><a class="text_yellow" href="#chefs">Chefs</a></li>
                            <li><a class="text_yellow" href="#gallery">Gallery</a></li>
                            <li><a class="text_yellow" href="#contact">Contact</a></li>
                            <li class="book-a-table text-center"><a class="text_yellow" href="#book-a-table">Book a table</a></li>
                        </ul>
                      </nav>
                  </div>
                  <div class="col-md-9">
                      
                </div>
              </div>
          </div>
      </main>

    {{-- modals --}}

    {{-- show users modal --}}
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