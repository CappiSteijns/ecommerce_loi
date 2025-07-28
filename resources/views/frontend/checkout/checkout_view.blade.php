<!-- Hier tonen we de checkout pagina. -->
@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
My Checkout
@endsection


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Checkout</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->




<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">

                            <!-- panel-heading -->

                            <!-- panel-heading -->

                            <div id="collapseOne" class="panel-collapse collapse in">

                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">

                                        <!-- guest-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <h4 class="checkout-subtitle"><b>Shipping Address</b></h4>

                                            <form class="register-form" action="{{ route('checkout.store') }}"
                                                method="POST">
                                                @csrf


                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Shipping
                                                            Name</b> <span>*</span></label>
                                                    <input type="text" name="shipping_name"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="Full Name"
                                                        value="{{ Auth::user()->name }}" required="">
                                                </div> <!-- // end form group  -->


                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Email </b>
                                                        <span>*</span></label>
                                                    <input type="email" name="shipping_email"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="Email"
                                                        value="{{ Auth::user()->email }}" required="">
                                                </div> <!-- // end form group  -->


                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Phone</b>
                                                        <span>*</span></label>
                                                    <input type="number" name="shipping_phone"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="Phone"
                                                        value="{{ Auth::user()->phone }}" required="">
                                                </div> <!-- // end form group  -->








                                        </div>
                                        <!-- guest-login -->





                                        <!-- already-registered-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">


                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1"><b>street_name</b>
                                                    <span>*</span></label>
                                                <input type="text" name="street_name"
                                                    class="form-control unicase-form-control text-input"
                                                    id="exampleInputEmail1" placeholder="street_name" required="">
                                            </div> <!-- // end form group  -->

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1"><b>house_number</b>
                                                    <span>*</span></label>
                                                <input type="text" name="house_number"
                                                    class="form-control unicase-form-control text-input"
                                                    id="exampleInputEmail1" placeholder="house_number" required="">
                                            </div> <!-- // end form group  -->

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1"><b>post_code</b>
                                                    <span>*</span></label>
                                                <input type="text" name="post_code"
                                                    class="form-control unicase-form-control text-input"
                                                    id="exampleInputEmail1" placeholder="post_code" required="">
                                            </div> <!-- // end form group  -->

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1"><b>city</b>
                                                    <span>*</span></label>
                                                <input type="text" name="city"
                                                    class="form-control unicase-form-control text-input"
                                                    id="exampleInputEmail1" placeholder="city" required="">
                                            </div> <!-- // end form group  -->

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1"><b>province</b>
                                                    <span>*</span></label>
                                                <input type="text" name="province"
                                                    class="form-control unicase-form-control text-input"
                                                    id="exampleInputEmail1" placeholder="province" required="">
                                            </div> <!-- // end form group  -->


                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Notes
                                                    <span>*</span></label>
                                                <textarea class="form-control" cols="30" rows="5" placeholder="Notes"
                                                    name="notes"></textarea>
                                            </div> <!-- // end form group  -->

                                            <div class="form-group">
                                                <h4 class="checkout-subtitle"><b>Bezorgtijd en Datum</b></h4>

                                                <label for="delivery_day"><b>Bezorgdag</b> <span>*</span></label>
                                                <select name="delivery_day" class="form-control" required>
                                                    <option value="Monday">Maandag</option>
                                                    <option value="Tuesday">Dinsdag</option>
                                                    <option value="Wednesday">Woensdag</option>
                                                    <option value="Thursday">Donderdag</option>
                                                    <option value="Friday">Vrijdag</option>
                                                    <option value="Saturday">Zaterdag</option>
                                                    <option value="Sunday">Zondag</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="delivery_time"><b>Tijdslot</b> <span>*</span></label>
                                                <select name="delivery_time" class="form-control" required>
                                                    <option value="08:00 - 12:00">08:00 - 12:00 (€4,95)</option>
                                                    <option value="16:00 - 22:00">16:00 - 22:00 (€6,95)</option>
                                                    <option value="19:00 - 21:00">19:00 - 21:00 (€7,50)</option>
                                                    <option value="20:00 - 22:00">20:00 - 22:00 (€7,50)</option>
                                                </select>
                                            </div>

                                            <input type="hidden" name="delivery_cost" id="delivery_cost" value="0">

                                        </div>
                                        <!-- already-registered-login -->

                                    </div>
                                </div>
                                <!-- panel-body  -->

                            </div><!-- row -->
                        </div>





                    </div><!-- /.checkout-steps -->
                </div>




                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">

                                        @foreach($carts as $item)
                                        <li>
                                            <strong>Image: </strong>
                                            <img src="{{ asset($item->options->image) }}"
                                                style="height: 50px; width: 50px;">
                                        </li>

                                        <li>
                                            <strong>Qty: </strong> ( {{ $item->qty }} )

                                            <strong>Color: </strong> {{ $item->options->color }}

                                            <strong>Size: </strong> {{ $item->options->size }}
                                        </li>
                                        @endforeach
                                        <hr>
                                        <li>
                                            <strong>SubTotal: </strong> €<span id="subtotal">{{ number_format($cartTotal, 2) }}</span>
                                            <hr>
                                            <strong>Shipping Cost: </strong> €<span id="shipping-cost">0.00</span>
                                            <hr>
                                            <strong>Grand Total: </strong> €<span id="grand-total">{{ number_format($cartTotal, 2) }}</span>
                                            <hr>
                                        </li>



                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>







                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                </div>


                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Stripe</label>
                                        <input type="radio" name="payment_method" value="stripe">
                                        <img src="{{ asset('frontend/assets/images/payments/4.png') }}">
                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">
                                        <label for="">Card</label>
                                        <input type="radio" name="payment_method" value="card">
                                        <img src="{{ asset('frontend/assets/images/payments/3.png') }}">
                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">
                                        <label for="">Cash</label>
                                        <input type="radio" name="payment_method" value="cash">
                                        <img src="{{ asset('frontend/assets/images/payments/2.png') }}">
                                    </div> <!-- end col md 4 -->


                                </div> <!-- // end row  -->
                                <hr>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment
                                    Step</button>


                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>







                </form>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <!-- === ===== BRANDS CAROUSEL ==== ======== -->








        <!-- ===== == BRANDS CAROUSEL : END === === -->
    </div><!-- /.container -->
</div><!-- /.body-content -->

<script>
document.addEventListener('DOMContentLoaded', function () {
    const deliveryTimeSelect = document.querySelector('select[name="delivery_time"]');
    const shippingCostElement = document.getElementById('shipping-cost');
    const grandTotalElement = document.getElementById('grand-total');
    const subtotalElement = document.getElementById('subtotal');
    const deliveryCostInput = document.getElementById('delivery_cost'); // Verborgen inputveld

    function updateCosts() {
        const selectedOption = deliveryTimeSelect.options[deliveryTimeSelect.selectedIndex];
        let shippingCost = 0;

        // Bereken verzendkosten op basis van de geselecteerde tijd
        switch (selectedOption.value) {
            case '08:00 - 12:00':
                shippingCost = 4.95;
                break;
            case '16:00 - 22:00':
                shippingCost = 6.95;
                break;
            case '19:00 - 21:00':
            case '20:00 - 22:00':
                shippingCost = 7.50;
                break;
        }

        // Update verzendkosten en Grand Total
        const subtotal = parseFloat(subtotalElement.textContent.replace(',', '.')) || 0;
        shippingCostElement.textContent = shippingCost.toFixed(2);
        grandTotalElement.textContent = (subtotal + shippingCost).toFixed(2);

        // Update het verborgen inputveld
        deliveryCostInput.value = shippingCost.toFixed(2);
    }

    // Event listener voor wijzigingen in de bezorgtijd
    deliveryTimeSelect.addEventListener('change', updateCosts);

    // Initialiseer de kosten bij het laden van de pagina
    updateCosts();
});
</script>

@endsection