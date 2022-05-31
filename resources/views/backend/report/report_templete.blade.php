<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: green;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: green;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
            <img src="{{asset('frontend/assets/images')}}/logo/forweb_class2.png" alt="Copmany logo" height="80px" width="300px"/>
          {{-- <h2 style="color: green; font-size: 26px;"><strong>Classy Multivendor Ecommerce</strong></h2> --}}
        </td>
        <td align="right">
            <pre class="font" >
                Date : {{Carbon\Carbon::today()->toDateString()}}
                Classy Multivendor Ecommerce Head Office
               Email:info@classy_multivendor_e-commerce.com <br>
               Mob: 01799328264 <br>
               Dhaka 1207,Mogbazar:#4 <br>

            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;"></table>


  <br/>
  @yield('main')
  <div class="thanks mt-3">
    <p>report Generate by : {{"demu"}}</p>
  </div>
  <div class="authority float-right mt-5">
      <p>-----------------------------------</p>
      <h5>Authority Signature:</h5>
    </div>
</body>
</html>
