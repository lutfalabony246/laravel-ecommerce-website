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

    .pos-receipt.main {
        width: 80mm;
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
        text-align: left;
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

</style>

<body>
    @php
       // dd($data);
    @endphp
    {{-- global tax --}}
    <input type="hidden" id="vat" class="vat" value="{{ Config::get('cart.tax') }}">
    {{-- end global tax --}}
    @php
        $info = App\Models\SiteSetting::get();
        // dd($info);
    @endphp
    <div class="pos-receipt main">
        <!-- ----------  Receipt Header ------------- -->
        @foreach ($info as $item)
            <div class="header">
                <h4 class="mb-3px">{{ $item->company_name }} POS</h4>
                <p>{{ $item->company_address }}

                </p>
                <p>{{ $item->phone_one }}</p>
                <p>BIN: {{ $item->phone_two }}</p>
                <p>BIN: {{ $item->email }}</p>
                <p>Mushak-6.3</p>
            </div>
        @endforeach

        <div>
            <p>---------------------------------------</p>
            <p class="text-center">Excel IT POS Invoice</p>
            <p>---------------------------------------</p>
        </div>
        <!-- ----------  Customer and Billing Info ------------- -->
        @php
            $name = Auth::guard('admin')->user()->name;
        @endphp
        <div class="customer-bill mb-10px ">
            <p>Invoice: {{ $data['invoice_no'] }}</p>
            <p>Bill Date: {{ Carbon\Carbon::now() }}</p>
            <p>Customer Name: {{ $data['customer_name'] }}</p>
            <p>Cashier: {{ $name }}
            </p>
            @php
                date_default_timezone_set('Asia/Dhaka');
            @endphp
            <p>Print Time: {{ date('Y-m-d h:i:sa') }}</p>
        </div>

        <!-- ----------  Product Table  ------------- -->
        <div class="products">
            <table>
                <tr>
                    <th>Sl.</th>
                    <th style="width: 100%;">Product</th>
                    <th>Total</th>
                </tr>
            
                @foreach ($data['products'] as $product)                    
                    <tr>
                        <td>{{ $product['id'] }}</td>
                        <td>{{ $product['pro_id']." ".$product['pro_name'] }} <br>
                            Price:{{ $product['product_price']." " }} x {{ " ".$product['pro_quantity'] }}
                        </td>
                        <td>{{ $product['sub_total']}}</td>
                    </tr>
                @endforeach
            </table>
            <p>---------------------------------------</p>
        </div>       

        <!-- ----------  Products Total  ------------- -->
        <div class="total">
            <table>
                <tr>
                    <td>Total Amount:</td>
                    <td>{{ $data['total_ammount'] }}</td>
                </tr>
                <tr>
                    <td>Discount: </td>
                    <td>{{ $data['discount'] }}%</td>
                </tr>
                <tr>
                    <td>VAT:</td>
                    <td>{{round($data['vat'], 2)}}</td>
                </tr>
                <tr>
                    <td>Total Payable: </td>
                    <td>{{ $data['totalPayable'] }}</td>
                </tr>
                <tr>
                    <td>Amount Paid: </td>
                    <td class="fw-bold">{{ $data['amount_pay'] }}</td>
                </tr>
                <tr>
                    <td>Change Amount: </td>
                    <td class="fw-bold">{{ $data['change_return'] }}</td>
                </tr>
            </table>
            <p>---------------------------------------</p>
        </div>

        <!-- ----------  Return and Footer  ------------- -->
        <div class="footer">
            <h5>Return Policy:</h5>
            <ul>
                <li>Please bring your receipt as proof of purchase for return or exchange within 3 days</li>
                <li>Cash refund is discouraged</li>
            </ul>
            <p class="text-center">*** Thank you for Shopping with us ***</p>
        </div>

    </div>
    {{-- @php
        dd($data);
    @endphp --}}
</body>

</html>
