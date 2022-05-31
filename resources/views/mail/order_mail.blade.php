<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Merriweather+Sans:wght@400;500;600;700&family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet">
</head>
<style>
    * {
        font-family: 'Merriweather Sans', sans-serif;
        margin: 0;
    }

    body {
        margin: 0 auto;
        padding: 0 auto;
    }

    .mb-3px {
        margin-bottom: 2px !important;
    }

    .mb-10px {
        margin-bottom: 10px !important;
    }

    .text-center {
        text-align: center;
    }

    .fw-bold {
        font-weight: bold;
    }

    .d-flex {
        display: flex !important;
    }

    .border-top {
        border-top: 1px solid grey !important;
    }

    .border-left {
        border-left: 1px solid grey !important;
    }

    .border-right {
        border-right: 1px solid grey !important;
    }

    .border-bottom {
        border-bottom: 1px solid grey !important;
    }

    .justify-content-between {
        justify-content: space-between;
    }

    .pos-receipt.main {
        width: 300px;
        margin-left: 15px;
        /* background-color: rgb(184, 214, 214);        */
    }

    .pos-receipt .header {
        text-align: center;
    }

    .pos-receipt h4,
    .pos-receipt p {
        margin: 0;
    }

    .pos-receipt h4 {
        font-size: 20px;
    }

    .pos-receipt p {
        font-size: 13px;
    }

    .pos-receipt .products th {
        font-size: 14px;
    }

    .pos-receipt .products td {
        font-size: 14px;
    }

    .pos-receipt .total td {
        font-size: 15px;
        text-align: right;
    }

    .pos-receipt .total td:first-child {
        width: 100%;
        padding-right: 20px;
    }

    .footer h5 {
        margin-top: 5px;
        font-size: 15px;
    }

    .footer ul {
        /* padding-left: 10px; */
        padding-left: 22px;
        font-size: 14px;
        margin-bottom: 20px;
    }

    table {
        border-collapse: collapse;
        width: 100% !important;
    }

    .T {
        padding-top: 15px;
        text-align: end;
        font-weight: bold;
        border-bottom: 1px solid gray;
    }

    .TB {
        margin-top: 25px;
        text-align: end;
        font-weight: bold;
        border-bottom: 1px solid gray;
    }

    .TB td {
        padding-top: 15px;
        padding-right: 0 !important;
    }

    .h5 {

        background-color: #b7b6b6;
        padding: 5px;
        margin: 0 13px;
    }

    .payableamount {
        border-top: 1px solid gray;
    }

    .change-amount {
        border-top: 1px solid gray;
    }

    .text-end {
        text-align: right
    }

    #table-details {
        text-align: center
    }

    #table-details td {
        vertical-align: top;
    }

    /* .p_id{
    padding-right: 70px;
} */

    .product_name {
        padding-left: 10px;
    }

</style>

<body>

    {{-- @php
        dd($data);
    @endphp --}}
    {{-- global tax --}}
    <input type="hidden" id="vat" class="vat" value="{{ Config::get('cart.tax') }}">
    {{-- end global tax --}}
    @php
        $info = App\Models\SiteSetting::first();

    @endphp
    <div style="">
        <div class="pos-receipt main" style="width: 500px; margin: auto;">
            <!-- ----------  Receipt Header ------------- -->
            <div class="header">
                <h4 class="mb-3px" style="text-align:center; ">{{ optional($info)->company_name }}</h4>
                <p style="text-align:center; margin: 3px;">{{ optional($info)->company_address }}</p>
                <p style="text-align:center; margin: 3px; ">Office Phone: {{ optional($info)->phone_one }}</p>
                <p style="text-align:center; margin: 3px;">BIN: {{ optional($info)->phone_two }}</p>
                <p style="text-align:center; margin: 3px;">E-mail: {{ optional($info)->email }}</p>
                <p style="text-align:center; margin: 3px;">Mushak-6.3</p>
            </div>


            <div style="text-align: center;margin: 3px;">
                <pre>  -----{{ optional($info)->company_name }} Cash Memo-----</pre>

            </div>
            <!-- ----------  Customer and Billing Info ------------- -->
            @php
                $name = Auth::user()->name;
            @endphp

            <div class="d-flex justify-content-between">



                <p  class="text-center" style="margin: 3px; "><span>Invoice: #{{ $data['invoice_no'] }}<b style="color:white">__________________________________</b> Cashier:</b></span>
                <p  class="text-center" style="margin: 3px; "><span>Bill Date: {{ date('d-m-Y') }} <b style="color:white">__________________________________</b> <b>Time: {{ date('h:i:sa') }}</b></span>

            </div>
            <hr style="border-top: 1px dotted grey;">



            <div class="customer-bill mb-10px ">
                @php
                    // date_default_timezone_set('Asia/Dhaka');
                @endphp
            </div>




            <!-- ----------  Product Table  ------------- -->
            <div class="products">
                <table id="table-details" style="width: 100%">
                    <div class="border-1">
                        <tr class="border-top border-left border-right">
                            <th style="text-align: left">Sl.Article</th>
                            <th colspan="3" style="text-align: left">Description</th>
                            <th style="text-align: right">UM</th>
                        </tr>

                        <tr class="border-bottom border-left border-right">
                            {{--  <th style="text-align: left">Sl.Article</th>
                            <th style="text-align: left"    >Quantity</th>
                            <th colspan="3" style="text-align: left">Product Name</th>  --}}
                            <th style="text-align: left"    >Quantity</th>
                            <th style="text-align: left"    >UnitPrice</th>
                            <th style="text-align: left"    >Vat</th>
                            <th style="text-align: left"    >Discount </th>
                            <th style="text-align: left"    >Total(TK.)</th>
                        </tr>
                    </div>
@php
    $total_subtotal = 0;
    $amount_of_discount = 0;
    $total_selling_price = 0;
@endphp

                    <div>
                        @foreach ($order->orderItems as $item)
                            <tr>
                                <td class="p_id"> <b>{{ $loop->iteration }}.{{optional($item)->product->product_code }}</b></td>
                                {{--  <td>{{ optional($item)->qty }}</td>  --}}
                                <td colspan="3" class="product_name">{{ optional($item->product)->product_name }}</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;padding-right: 3rem">{{ optional($item)->qty }}</td>
                                <td>{{ optional($item)->product->selling_price}}</td>
                                <td> 0.00TK.</td>
                                <td>{{optional($item)->product->discount_price}}TK.</td>
                                <td>{{ optional($item)->price }}TK.</td>
                                @php
                                $total_subtotal += $item->price;
                                $amount_of_discount += ($item->product->selling_price - $item->product->discount_price);
                                $total_selling_price += optional($item)->product->selling_price * optional($item)->qty;
                                @endphp
                            </tr>
                        @endforeach
                    </div>
                </table>

                <p style="text-align: right; font-weight: 700; margin-top: 10px;">Bill Summery</p>
                <hr style="border-top: 1px dotted grey;">
            </div>

            <!-- ----------  Products Total  ------------- -->
            <div class="total">
                <table style="width: 100%">
                    <tr>
                        <td style="text-align: right;">Sub Total (Qty x Price):</td>

                        <td  style="text-align: right;">{{ $total_selling_price }}TK.</td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">Total Discount: </td>
                            <td style="text-align: right;">(-){{ $amount_of_discount }}TK.</td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">Special Discount: </td>
                        <td style="text-align: right;" >(-)0.00TK.</td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">Total Vat:</td>
                        <td style="text-align: right;">0.00TK.</td>
                    </tr>

                    <tr>
                        <td style="text-align: right;">Delivery Fees:</td>
                        <td style="text-align: right;">(+)0.TK.</td>
                    </tr>

                    <tr>
                        <td style="text-align: right;">Net Amount:</td>
                        <td style="text-align: right;"> {{ optional($order)->amount }}TK.</td>
                    </tr>


                    <tr class="payableamount"  >
                        <td style="text-align: right;border-top: 1px dotted grey;">Net Payable Amount: </td>
                        <td style="text-align: right;border-top: 1px dotted grey;">{{ optional($order)->amount }}TK.</td>
                    </tr>
                    <tr class="TB">
                        <td colspan="2" style="text-align: right; font-weight: 700; margin-top: 10px;">Payment Details</td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">Cash Paid: </td>
                        <td class="fw-bold" style="text-align: right;">0.00TK.</td>
                    </tr>
                    <tr class="change-amount">
                        <td style="text-align: right;">Change Amount: </td>
                        <td class="fw-bold" style="text-align: right;">0.00TK.</td>
                    </tr>
                </table>
            </div><br>


            <h5 class="h5">Call For Free Home Delivery-{{ optional($info)->phone_one }}</h5>

            <!-- ----------  Recycle Offer  ------------- -->
            <div style="margin-top:-50px">
                <h5>Recycle Offer:</h5>
                <ul>
                    <li>Recycle out shopping bag and get cash for each bag as discount on your purchase</li>
                </ul>

            </div>
            <!-- ----------  Return and Footer  ------------- -->
            <div class="footer">
                <h5>Return Policy:</h5>
                <ul>
                    <li>Please bring your receipt as proof of purchase as proof of purchase for return or exchange within 3
                        days</li>
                    <li>No perchable return of exchange after 3 hrs of purchase</li>
                    <li>Money refund is not available</li>
                </ul>
                <p class="text-center" style="text-align:center; margin: 3px;" >Share Your Opinion at <br> {{ optional($info)->email }} <br>*244578*</p><br>
                <p class="text-center" style="text-align:center; margin: 3px;">*** Thank you for Being with us ***</p>
            </div>

        </div>
    </div>
</body>

</html>
