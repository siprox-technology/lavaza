@extends('layouts.app')
@section('content')


    
      <main id="main">
    
        <!-- ======= forget password Section ======= -->
        <section id="forget-pass" class="about">
          <div class="container-fluid">
    
            <div class="row">
    
              <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("assets/img/about.jpg");'>
                <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
              </div>
    
              <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">
    
                <div class="content">
                  <h3>Forget password</h3>
                  <h4 class="text-center mt-3">Please enter your email address:</h4>
                  <form class="text-left clearfix" action="{{route('forgetPassword.email')}}" method="POST">
                      @csrf
                      <div class="form-group">
                          <input type="text" name="email" 
                          class="form-control @error('email') border border-danger @enderror" 
                          placeholder="Your email">
                          @error('email')
                              <div class="text-danger mt-2">
                                  {{$message}}
                              </div>
                          @enderror
                      </div>
                      @if (session('status'))
                          <div class="text-success my-2 text-center">
                              {{session('status')}}
                          </div>
                      @endif
                      <div class="text-center">
                          <button type="submit" class="btn btn-primary">Reset pass</button>
                      </div>
                  </form>
                <p class="mt-3">New in this site ?<a href="{{route('register.index')}}"> Create New Account</a></p>
                <a href="{{route('forgetPassword.index')}}"><p class="mt-3">Forget password ?</p></a>
                </div>
    
              </div>
    
            </div>
    
          </div>

    
      </main><!-- End #main -->
      {{-- scroll to forget password section --}}
      <script type="text/javascript">
          document.getElementById("forget-pass").scrollIntoView();
      </script>
    

@endsection