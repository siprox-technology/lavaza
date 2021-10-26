@extends('layouts.app')

@section('content')
    <!-- order and payment-->
    <!-- main wrapper -->
    <div class="main-wrapper" id='order-confirm'>

        @foreach ($_GET['payment_data'] as $item)
            <h5>{{ $item }}</h5>
            <br>
        @endforeach

        <br>

        {{-- links to view cart --}}
        <a href="{{ route('order.index') }}">سبد خرید</a>
        {{-- links to order history --}}
        <br>
        @auth
            <a dusk="order_history" href="{{ route('dashboard.order-history.index') }}">سابقه سفارشات</a>
        @endauth
</div>
<script type="text/javascript">
    document.getElementById("order-confirm").scrollIntoView();
</script>
@endsection
