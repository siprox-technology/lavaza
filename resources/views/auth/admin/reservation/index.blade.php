@extends('layouts.app')
@section('content')


    <main id="reservations" class="col-12">
        <div class="row justify-content-center py-5 w-100 mx-auto">
            <h1 class="text_yellow">پنل ادمین</h1>
        </div>

        <div class="row justify-content-center w-100 m-0">
            {{-- reservation date --}}
            <div class="row justify-content-center">
                <form action="{{route('reservations.show')}}" method="POST">
                    @csrf
                    <input type="text" id="reservation_date" name="date" placeholder="انتخاب تاریخ"
                    value="{{$date}}">
                    <button type="submit">نمایش</button>
                </form>
            </div>
        </div>
        {{-- resevations --}}
        <div class="row">
            @foreach ($reservations as $reservation)
                <div class="col-lg-2 col-md-3 col-sm-4 col-10 border border-dark p-3 m-2">
                    <ul class="list-unstyled">
                        <li>نام : {{$reservation->user->name}}</li>
                        <li>شماره میز : {{$reservation->table_number}} </li>
                        <li>زمان : {{$reservation->time}}</li>
                        <li>اطلاعات رزرو :{{$reservation->notes}} </li>
                        <li>قیمت : {{$reservation->price}} </li>
                    </ul>
                </div>                
            @endforeach

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
