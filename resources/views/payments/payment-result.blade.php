

@foreach ($_GET['payment_data'] as $item)
    <h5>{{$item}}</h5>
    <br>
@endforeach

<br>

{{-- links to view cart --}}
<a href="{{route('order.index')}}">سبد خرید</a>
{{-- links to order history --}}
<br>
<a href="">سابقه سفارشات</a>
