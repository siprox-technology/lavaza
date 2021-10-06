@extends('layouts.app')
@section('content')


    <main id="reservations" class="col-12">
        <div class="row justify-content-center py-5 w-100 mx-auto">
            <h1 class="text_yellow">پنل ادمین</h1>
        </div>

        <div class="row justify-content-center w-100 m-0">
            {{-- reservation date --}}
            <div class="row justify-content-center">
                <input type="text" id="reservation_date" placeholder="انتخاب تاریخ">
            </div>
        </div>
        {{-- resevations --}}
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4 col-10 border border-dark p-3 m-2">
                <ul class="list-unstyled">
                    <li>نام:</li>
                    <li>:شماره میز</li>
                    <li>زمان:</li>
                    <li>اطلاعات رزرو:</li>
                    <li>قیمت:</li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-10 border border-dark p-3 m-2">
               <a dusk="createReservation_link" href="{{route('reservations.create')}}"><img src="{{asset('images/menu/ایتم جدید.jpg')}}" alt=""></a> 
            </div>
        </div>
    </main>

    {{-- modals --}}
    <script type="text/javascript">
        document.getElementById("reservations").scrollIntoView();
    </script>
@endsection
