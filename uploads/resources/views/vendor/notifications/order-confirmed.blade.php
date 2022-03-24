@component('mail::message')
{{-- Intro Lines --}}
<h2 style="text-align: center; color:green">{{ $introLines }}</h2>

{{-- Outro Lines --}}
{{-- @foreach ($outroLines as $line) --}}
<div style="text-align: center">
     <h3 style="text-align: center">: مبلغ</h3>
    تومان {{$outroLines['amount']}} 
     <h3 style="text-align: center">: شماره سفارش</h3>
    {{ $order_id }}
     <h3 style="text-align: center">: شماره پیگیری</h3>
    {{$outroLines['payment_ref']}}
     <h3 style="text-align: center">: تاریخ پرداخت</h3>
    {{$outroLines['date_time']}}
</div>

@endcomponent
