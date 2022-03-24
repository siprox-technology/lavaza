@component('mail::message')
{{-- Intro Lines --}}
<h2 style="text-align: center; color:green">{{ $introLines }}</h2>

{{-- Outro Lines --}}
{{-- @foreach ($outroLines as $line) --}}
<div style="text-align: center">
     <h3 style="text-align: center">: مبلغ</h3>
    تومان {{$outroLines->total_price}} 
     <h3 style="text-align: center">: شماره سفارش</h3>
    {{ $outroLines->id }}
     <h3 style="text-align: center">: تاریخ پرداخت</h3>
    {{$date_time}}
    <h3 style="text-align: center">{{$salutation}}</h3>
</div>

@endcomponent
