@extends('layouts.app', [
    'title' => 'Server error happened',
    'errorCode' => '500',
    'homeLink' => false,
])
@section('content')
    
<div class="container my-5 py-5" id="error-419">
    <div class="row mx-auto justify-content-center w-100">
        <h4 class="text-danger">
            صفحه مورد نظر یافت نشد 
        </h4>
    </div>
    <div class="row mx-auto justify-content-center w-100 mt-5">
        <h4 class="text-success">
            <a href="{{URL::previous()}}" class="btn btn-warning">بازشگت به صفحه قبل</a>
        </h4>
    </div>
</div>
<script type="text/javascript">
    document.getElementById("error-419").scrollIntoView();
</script>
@endsection
