@foreach($cart_items as $cart_product)
Quantité : {{$cart_product->qty}};
Prix unitaire : {{number_format($cart_product->price)}};
Prix total : {{number_format($cart_product->price*$cart_product->qty)}}


@if($cart_count !== 0)
    @if(\Illuminate\Support\Facades\Auth::check())
        <a href="{{route('checkout')}}" class="btn btn-outline-primary-2 btn-order btn-block">PASSER À LA CAISSE</a>
    @else
        <a href="{{route('register')}}" class="btn btn-outline-primary-2 btn-order btn-block">INSCRIVEZ-VOUS ICI</a>
    @endif
@endif
<a href="{{url('/')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUER VOS ACHATS</span><i class="icon-refresh"></i></a>
@endforeach