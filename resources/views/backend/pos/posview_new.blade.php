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
    body{
        margin: 0 auto;
        padding: 0 auto;
    }
    .mb-3px {
        margin-bottom: 3px !important;
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

    .d-flex{
        display: flex !important;
    }
    .border-top{
        border-top: 1px solid grey!important;
    }
    .border-left{
        border-left: 1px solid grey!important;
    }
    .border-right{
        border-right: 1px solid grey!important;
    }
    .border-bottom{
        border-bottom: 1px solid grey!important;
    }
    .justify-content-between{
        justify-content: space-between;
    }

    .pos-receipt.main {
        width: 98mm;
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

    table{
        border-collapse: collapse;
        width: 100%!important;
    }

    .T{
        padding-top: 15px;
        text-align: end;
        font-weight: bold;
        border-bottom: 1px solid gray;
    }
    .TB{
        margin-top: 25px;
        text-align: end;
        font-weight: bold;
        border-bottom: 1px solid gray;
    }
.TB td{
    padding-top: 15px;
    padding-right: 0 !important;
}

.h5{

    background-color: #b7b6b6;
    padding:5px;
    margin:0 13px;
}
.payableamount {
    border-top: 1px solid gray;
}
.change-amount{
    border-top: 1px solid gray;
}
.text-end{
    text-align: right
}
#table-details{
    text-align: center
}

#table-details td{
    vertical-align: top;
}
/* .p_id{
    padding-right: 70px;
} */

.product_name{
    padding-left: 10px;
}

</style>

<body onload="printPOS()">

    {{-- @php
        dd($data);
    @endphp --}}
    {{-- global tax --}}
    <input type="hidden" id="vat" class="vat" value="{{ Config::get('cart.tax') }}">
    {{-- end global tax --}}
    @php
        $info = App\Models\SiteSetting::first();

    @endphp
    <div class="pos-receipt main">
        <!-- ----------  Receipt Header ------------- -->
            <div class="header">
                <h4 class="mb-3px">{{ optional($info)->company_name }}</h4>
                <p>{{ optional($info)->company_address }}

                </p>
                <p>Office Phone: {{optional($info)->phone_one }}</p>
                <p>BIN: {{optional($info)->phone_two }}</p>
                {{-- <p>BIN: {{ $item->email }}</p> --}}
                <p>Mushak-6.3</p>
            </div>


        <div style="text-align: center">
            <pre>  -----{{optional($info)->company_name }} Cash Memo-----</pre>
            {{-- <p class="text-center">Excel IT POS Invoice</p>
            <p>---------------------------------------</p> --}}
        </div>
        <!-- ----------  Customer and Billing Info ------------- -->
        @php
            $name = Auth::guard('admin')->user()->name;
        @endphp

        <div class="d-flex justify-content-between">
            <p>Invoice: #{{$data['invoice_no'] }}</p>
            <p>Cashier: {{$name}}</p>
        </div>


        <div class="d-flex justify-content-between">
            <p>Bill Date: {{ date('d-m-Y') }}</p>
            <p>Time: {{date("h:i:sa")}}</p>
        </div>


       <div class="customer-bill mb-10px ">

        @php
            // date_default_timezone_set('Asia/Dhaka');
        @endphp

    </div>




        <!-- ----------  Product Table  ------------- -->
        <div class="products">
                    <table id="table-details">
                        <div class="border-1">

                            <tr class="border-top border-left border-right">
                                <th>Sl.Article</th>
                                <th>Description</th>
                                <th colspan="3" class="text-end">UM</th>
                            </tr>

                            <tr class="border-bottom border-left border-right">
                                <th>Quantity</th>
                                <th>UnitPrice</th>
                                <th>Vat</th>
                                <th>Discount </th>
                                <th>Total(TK.)</th>
                            </tr>
                        </div>


                        <div>
                            @foreach ($data['products'] as $key => $product)
                            <tr>
                                <td class="p_id"> <b>{{$key+1}}.{{$product['product_code'] }}</b></td>
                                <td class="product_name">{{$product['pro_name']}}</td>
                            </tr>
                            <tr>
                                <td>{{$product['pro_quantity'] }}</td>
                                <td>{{floatval($product['product_price'])}}TK.</td>
                                <td>{{floatval($product['vat'])}}TK.</td>
                                <td>{{floatval(($product['product_price']-$product['discount_price']) * $product['pro_quantity'] )}}TK.</td>
                                <td>{{floatval($product['totalDiscountPrice']+$product['vat'])}}TK.</td>
                            </tr>
                            @endforeach
                        </div>
                    </table>

            <p class="T">Bill Summery</p>
        </div>

        <!-- ----------  Products Total  ------------- -->
        <div class="total">
            <table>
                <tr>
                    <td>Sub Total (Qty x Price):</td>
                    <td>{{floatval($data['totalAmount'])}}TK.</td>
                </tr>
                <tr>
                    <td>Total Discount: </td>
                    <td>(-){{floatval($data['totalAmount'] -

                    $data['totalDiscount'])}}TK.</td>
                </tr>
                <tr>
                    <td>Special Discount: </td>
                    <td>(-){{floatval( $data['spesial_discount'])}}TK.</td>
                </tr>
                <tr>
                    <td>Total Vat:</td>
                    <td>(+){{floatval( $data['vat'])}}TK.</td>
                </tr>

                <tr>
                    <td>Delivery Fees:</td>
                    <td>(+)0.TK.</td>
                </tr>

                <tr>
                    <td>Net Amount:</td>
                    <td> {{floatval($data['cash_grand_tot'])}}TK.</td>
                </tr>
                <tr class="payableamount">
                    <td>Net Payable Amount: </td>
                    <td>{{floatval( $data['cash_grand_tot'] )}}TK.</td>
                </tr>
                <tr class="TB"><td colspan="2">Payment Details</td></tr>
                <tr>
                    <td>Cash Paid: </td>
                    <td class="fw-bold">{{floatval( $data['cashPaid_show'] )}}TK.</td>
                </tr>
                <tr class="change-amount">
                    <td>Change Amount: </td>
                    <td class="fw-bold">{{ floatval($data['changeAmount']) }}TK.</td>
                </tr>
            </table>
        </div><br>


<h5 class="h5">Call For Free Home Delivery-{{optional($info)->phone_one}}</h5><br>




 <!-- ----------  Recycle Offer  ------------- -->
<div >
    <h5>Recycle Offer:</h5>
    <ul>
        <li>Recycle out shopping bag and get cash for each bag as discount on your purchase</li>
    </ul>

</div>


        <!-- ----------  Return and Footer  ------------- -->
        <div class="footer">
            <h5>Return Policy:</h5>
            <ul>
                <li>Please bring your receipt as proof of purchase as proof of purchase for return or exchange within 3 days</li>
                <li>No perchable return of exchange after 3 hrs of purchase</li>
                <li>Money refund is not available</li>
            </ul>
            <p class="text-center">Share Your Opinion at <br> {{optional($info)->email}} <br>*244578*</p><br>
            <p class="text-center">*** Thank you for Being with us ***</p>
        </div>

    </div>

    <script>
        function printPOS(){
            window.print();
        }
    </script>
</body>



</html>
