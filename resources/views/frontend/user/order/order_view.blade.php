<!-- Hier tonen we de order view pagina voor de gebruiker. -->
@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')

            <div class="col-md-2">
            </div>

            <div class="col-md-8">

                <div class="table-responsive">
                    <table class="table">
                        <tbody>

                            <tr style="background: #e2e2e2;">
                                <td class="col-md-1">
                                    <label for=""> Datum bestelling</label>
                                </td>

                                <td class="col-md-3">
                                    <label for=""> Totaal</label>
                                </td>

                                <td class="col-md-3">
                                    <label for=""> Bezorgdag</label>
                                </td>


                                <td class="col-md-2">
                                    <label for=""> Bezorgtijd</label>
                                </td>

                                <td class="col-md-2">
                                    <label for=""> Order</label>
                                </td>
                                

                                <td class="col-md-1">
                                    <label for=""> Action </label>
                                </td>

                            </tr>


                            @foreach($orders as $order)
                            <tr>
                                <td class="col-md-1">
                                    <label for=""> {{ $order->created_at }}</label>
                                </td>

                                <td class="col-md-3">
                                    <label for=""> €{{ $order->amount }}</label>
                                </td>


                                <td class="col-md-3">
                                    <label for=""> {{ $order->delivery_day }}</label>
                                </td>

                                <td class="col-md-2">
                                    <label for=""> {{ $order->delivery_time }}</label>
                                </td>

                                <td class="col-md-2">
                                    <label for="">
                                        <span class="badge badge-pill badge-warning"
                                            style="background: #418DB9;">{{ $order->status }} </span>

                                    </label>
                                </td>

                                <td class="col-md-1">
                                    <a href="{{ url('user/order_details/'.$order->id ) }}"
                                        class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>

                                    <a href="" class="btn btn-sm btn-danger"><i class="fa fa-download"
                                            style="color: white;"></i> Invoice </a>

                                </td>

                            </tr>
                            @endforeach





                        </tbody>

                    </table>

                </div>





            </div> <!-- / end col md 8 -->





        </div> <!-- // end row -->

    </div>

</div>


@endsection