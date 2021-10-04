@extends('layouts.app')
@section('content')


    <main id="">
        <div class="row justify-content-center py-5 w-100 mx-auto">
            <h1 class="text_yellow">پنل ادمین</h1>
        </div>

        {{-- Persian calendar --}}
        <h1>تقویم شمسی کاما - نسخه 1.5.3</h1>

        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 rtl-col">
                <span class="label label-default">حالت پیشفرض</span>
                <input type="text" id="date1">
                <br>
            </div>
        </div>
    </main>

    {{-- modals --}}
    <script type="text/javascript">
        document.getElementById("reservations").scrollIntoView();
    </script>
@endsection
