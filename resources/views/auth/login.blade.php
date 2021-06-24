@extends('layouts.app')
@section('content')


    
      <main id="main">
    
        <!-- ======= login Section ======= -->
        <section id="login" class="about">
          <div class="container-fluid">
    
            <div class="row">
    
              <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("assets/img/about.jpg");'>
                <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
              </div>
    
              <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">
    
                <div class="content">
                  <h3>Login</h3>
                  <form class="text-left clearfix" method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" 
                        class="form-control 
                        @error('email') border border-danger @enderror 
                        @error('status') border border-danger @enderror" 
                        placeholder="Email" value="{{old('email')}}">
                        @error('email')
                        <div class=" text-danger mt-2 ">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" 
                        class="form-control 
                        @error('password') border border-danger @enderror 
                        @error('status') border border-danger @enderror"
                        placeholder="Password">
                        @error('password')
                        <div class=" text-danger mt-2 ">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    @error('status')
                        <div class="text-center text-danger mt-2 ">
                            {{$message}}
                        </div>
                    @enderror           
                </form>
                <p class="mt-3">New in this site ?<a href="{{route('register.index')}}"> Create New Account</a></p>
                <a href="{{route('forgetPassword.index')}}"><p class="mt-3">Forget password ?</p></a>
                </div>
    
              </div>
    
            </div>
    
          </div>

    
      </main><!-- End #main -->
      {{-- scroll to login section --}}
      <script type="text/javascript">
          document.getElementById("login").scrollIntoView();
      </script>

@endsection