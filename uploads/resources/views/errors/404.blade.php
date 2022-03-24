@extends('layouts.app')
@section('content')
    
<div class="container my-5 py-5 border rounded" id="error-404"  style="background:#35322d;">
    <div class="row mx-auto justify-content-center w-100">
        <h4 class="text-danger">
            صفحه مورد نظر یافت نشد 
        </h4>
    </div>
    <div class="row mx-auto justify-content-center w-100 mt-5">
        <h4 class="text-success">
            <a href="{{route('home')}}" class="btn btn-warning"> بازشگت به خانه</a>
        </h4>
    </div>
</div>
<script type="text/javascript">
    document.getElementById("error-404").scrollIntoView();
</script>
@endsection