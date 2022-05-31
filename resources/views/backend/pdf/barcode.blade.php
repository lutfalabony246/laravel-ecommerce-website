<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download pdf -- barcode details</title>
</head>
<style>
    /* table{
        border-spacing: 30px;
    } */
    .barcode {
        text-align: center;
        font-family: arial, sans-serif;
        font-weight: 400;
    }

    .barcode p {
        font-size: 10px;
        margin: 5px 0;
    }

    .barcode p.name {
        margin: -2px 0;
    }

    .barcode p.sku {
        margin-top: 4px;
    }

</style>

<body>
    @php
        $custom_quantity = ceil((int) $print_quantity);
        $remaining_quantity = $print_quantity;
        $product_code = 1001;
    @endphp
    @for ($i = 0; $i < $print_quantity; $i++)
        <table>
            <tr>
                <td>
                    <div class="barcode">
                        <p class="name">Name: {{ $Purchase_item->product_name }} </p>
                        <p class="price">Price: {{ $Purchase_item->discount_price }} BDT </p>
                        <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG(strval($Purchase_item->id), 'C128', 2.0, 30, [1, 1, 1]) }}"
                            alt="barcode" />
                        <p class="sku">P:<b> {{ $Purchase_item->product_code }}</b></p>
                    </div>
                    {{-- <img src="data:image/png;base64,' . {{DNS1D::getBarcodePNG($id, 'C128',2,40,array(1,1,1))}} . '" alt="barcode"   /> --}}
                </td>
            </tr>
        </table>
    @endfor
</body>

</html>
