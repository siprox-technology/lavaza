@extends('layouts.app')
@section('content')


    
      <main id="main">
    
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
          <div class="container-fluid">
    
            <div class="row">
    
              <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("assets/img/about.jpg");'>
                <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
              </div>
    
              <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">
    
                <div class="content">
                    <h3>Dashboard</h3>
                    <p>Email:</p>
                    @if (!auth()->user()->email_verified_at)
                        <p class="text-danger">Please verify emails address</p>
                        <form action="{{route('verification.send')}}" method="POST">
                            @csrf
                            <button type="submit">resend verification email</button>
                        </form>
                        @if (session('message'))
                            <p class="text-success">{{session('message')}}</p>
                        @endif
                    @else
                    <p class="text-success">Email verified</p>
                    @endif
                </div>
    
              </div>
    
            </div>
    
          </div>

    
      </main><!-- End #main -->
    

@endsection