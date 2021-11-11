@extends('layouts.app')
@section('content')
    
<div class="container my-5 py-5 border rounded"  style="background:#35322d;" id="error-403">
    <div class="row mx-auto justify-content-center w-100">
        <h4 class="text-danger">
            لینک مورد نظر منقضی شده. لطفا مجددا از طریق حساب کاربری درخواست لینک کنید
        </h4>
    </div>
    <div class="row mx-auto justify-content-center w-100 mt-5">
        <h4 class="text-success">
            <a href="{{route('dashboard.index')}}" class="btn btn-warning">بازشگت به حساب کاربری</a>
        </h4>
    </div>
</div>
<script type="text/javascript">
    document.getElementById("error-403").scrollIntoView();
</script>
@endsection
