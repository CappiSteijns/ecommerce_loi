<!-- Hier tonen we de winkelwagen pagina van de gebruiker. -->
@extends('frontend.main_master')
@section('content')

@section('title')
My Cart Page
@endsection


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>MyCart</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row ">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-romove item">Image</th>
                                    <th class="cart-description item">Name</th>
                                    <th class="cart-qty item">Quantity</th>
                                    <th class="cart-sub-total item">Subtotal</th>
                                    <th class="cart-total last-item">Remove</th>
                                </tr>
                            </thead><!-- /thead -->
                            <tbody id="cartPage">

                            </tbody>
                        </table>
                    </div>

                    <!-- Checkout Button -->
                    <div class="cart-checkout-btn pull-right mt-3">
                        <a href="{{ route('checkout') }}" class="btn btn-primary btn-lg checkout-btn">
                            PROCEED TO CHECKOUT
                        </a>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->



        <br>
        @include('frontend.body.brands')
    </div>







    @endsection