<div class="page-content">
            <div class="checkout">
                <div class="container">
                    <form action="{{route('order.new')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-2">
                            </div><!-- End .col-lg-2 -->
                            <div class="col-lg-8">
                                <div class="summary">
                                    <h3 class="summary-title">Votre commande</h3>
                                    <table class="table table-summary">
                                        <thead>
                                            <tr>
                                                <th>Produit</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cart_items as $cart_product)
                                                <tr>
                                                    <td>{{$cart_product->name}}</td>
                                                    <td>{{number_format($cart_product->price*$cart_product->qty, 2)}} FCFA</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td>Livraison:</td>
                                                <td>Gratuit</td>
                                            </tr>
                                        </tbody>
                                    </table><!-- End .table table-summary -->
                                    @if(\Illuminate\Support\Facades\Auth::check() && $cart_count !== 0)
                                        <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                            Passer la commande
                                        </button>
                                    @endif
                                </div><!-- End .summary -->
                            </div><!-- End .col-lg-8 -->
                            <div class="col-lg-2">
                            </div><!-- End .col-lg-2 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->