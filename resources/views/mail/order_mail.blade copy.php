<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="color-scheme" content="light">
        <meta name="supported-color-schemes" content="light">
    </head>

    <body >

    <style>
    @media  only screen and (max-width: 600px) {
    .inner-body {
    width: 100% !important;
    }
    .footer {
    width: 100% !important;
    }
    }
    @media  only screen and (max-width: 500px) {
    .button {
    width: 100% !important;
    }
    }
    .px-2{
        padding-left: 5px;
        padding-right: 5px;
    }
    </style>


    <section class="main-content sendmail">
        <div class="container-sm">
            <div class="row">
               <div class="border-top-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-lg-8">
                                <a href="http://127.0.0.1:8000" style="box-sizing: border-box; font-family:
                                -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial,
                                sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
                                 position: relative; color: #3D4852; font-size: 19px; font-weight:
                                 bold; text-decoration: none; display: inline-block;">

                                    @php
                                    $setting = App\Models\SiteSetting::select('logo')->first();
                                    @endphp

                                <img src= {{ asset(optional($setting)->logo) }} class="logo" alt="Bpp Shops
                                    Logo" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont,
                                'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji',
                                 'Segoe UI Symbol'; position: relative; max-width: 100%; border: none; height: 75px; width: 75px;">
                               </a>

                                <div class="header">
                                    <h1 style="text-align:center"> Your Order has been placed!</h1>
                                    <h1 style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3d4852; font-size: 18px; font-weight: bold; margin-top: 0; text-align: left;">
                                        Hello! {{ $order->name }}
                                    </h1>
                                    <p style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
                                        We are pleased to share that the item(s) from your order <b>Invoice no : {{ $order->invoice_no }}</b>  has been placed.
                                        <br>
                                        Thank you for staying with us.
                                    </p>
                                </div>
                                <hr>

                                <div class="body">
                                    <h3 style="font-size: 18px; color: #3d4852 !important;"><b>Order Details</b></h3>
                                    <div class="row">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-5">
                                            <table>

                                                    @foreach ($order->orderItems as $item)
                                                    <tr>
                                                        <td class="px-2"> <b>Product Name:</b> </td>
                                                        <td class="px-2"> <b>Quantity:</b>  </td>
                                                        <td class="px-2"> <b>Price:</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2"> {{ optional($item->product)->product_name }} </td>
                                                        <td class="px-2"> {{ optional($item)->qty }} </td>
                                                        <td class="px-2"> ৳{{optional($item)->price }} </td>
                                                    </tr>
                                                    @endforeach

                                            </table>
                                        </div>
                                        <div class="col-lg-4"></div>
                                    </div>
                                    <hr style="margin-top:2rem;">
                                    <h5 style="font-size: 16px;" >Total Ammount : ৳ {{ $order->amount }}</h5>

                                    <div style="font-size: 16px">
                                        <h5>Order Date : {{ $order->order_date }}</h5>
                                        <h5>Payment Method : Cash On Delivery </h5>
                                        {{--  <h5>For more update
                                            <br> <a href="{{ url('/order/tracking') }}">Track your order</a>
                                        </h5>  --}}
                                    </div>

                                    <hr>

                                    <div>
                                        <h3 style="font-size: 18px; color: #3d4852 !important;"><b>Delivery Details</b></h3>
                                        <div style="">
                                            <h4>Customer Name    : {{ $order->name }} </h4>
                                            <h4>Customer Phone   : {{ $order->phone }} </h4>
                                            <h4>Customer Email   : {{ $order->email }} </h4>
                                            {{--  <h4>Customer Address : {{ $order->division->name }},{{ $order->district->name }},{{ $order->state->name }}</h4>  --}}
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <tr>
                            <td style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">
                            <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px; margin: 0 auto; padding: 0; text-align: center; width: 570px;">
                                <tr>
                                    <td class="content-cell" align="center" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; padding: 32px;">
                                        <p style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont,
                                        'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
                                        position: relative; line-height: 1.5em; margin-top: 0; color: #b0adc5; font-size: 12px; text-align: center;">© 2022 BPP SHOPS. All rights reserved.</p>
                                    </td>
                                </tr>
                            </table>
                            </td>
                        </tr>

                    </div>
               </div>

            </div>
        </div>

    </section>


    </body>
</html>


