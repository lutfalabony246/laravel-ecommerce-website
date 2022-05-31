<!DOCTYPE html>
<html lang="en">
<head>
    @php
        $seo = App\Models\Seo::first();
    @endphp
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ optional($seo)->meta_title }}</title>
    <meta name= "title" content={{ optional($seo)->meta_title }} >
    <meta name="author" content={{ optional($seo)->meta_author }}>
    <meta name="description" content={{ optional($seo)->meta_description }}/>
    <meta name="keywords" content={{ optional($seo)->meta_keyword }}>
    <meta name="google" content={{ optional($seo)->google_analytics }}>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href=" {{ asset('frontend/assets/images/favicon/favicon.png') }} " type="image/x-icon">
    <link rel="shortcut icon" href=" {{ asset('frontend/assets/images/favicon/favicon.png') }} " type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/fontawesome.min.css" integrity="sha512-8Vtie9oRR62i7vkmVUISvuwOeipGv8Jd+Sur/ORKDD5JiLgTGeBSkI3ISOhc730VGvA5VVQPwKIKlmi+zMZ71w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&amp;display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Days+One&amp;display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- Font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Owl-Carousel  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css"
        integrity="sha512-RWhcC19d8A3vE7kpXq6Ze4GcPfGe3DQWuenhXAbcGiZOaqGojLtWwit1eeM9jLGHFv8hnwpX3blJKGjTsf2HxQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--icon css-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/assets/css/themify.css ') }}">
    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/assets/css/slick.css ') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/assets/css/slick-theme.css ') }}">
    <!--Animate css-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/assets/css/animate.css ') }}">
    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/assets/css/bootstrap.css ') }}">
    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/assets/css/islamic_color_11.css') }}" media="screen"
        id="color">
    <!-- -----------------------  Custom CSS for Sidebar and Other Pages ------------------------- -->
    <link rel="stylesheet" href=" {{ asset('frontend/assets/css/islamic_style.css ') }}">
    <!-- Selling Product CSS  -->
    <link rel="stylesheet" href=" {{ asset('frontend/assets/css/selling_product.css ') }}">    

    @yield('css')
</head>
<style>

/* <<<<<<<<<<<<< Style for bpp_shop_main_container start >>>>>>>>>>>>>>>> */
.bpp_shop_main_container .card {
    margin-bottom: 22px;
    text-align: center;
    padding: 0 0 20px 0;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}
.bpp_shop_main_container .card:hover {
    border: 1px solid #ffff;
    box-shadow: 1px 1px 8px lightgray;
    transform: translateY(-10px);
}
.bpp_shop_main_container .card .upcoming {
    margin: 5px 10px 0 0;
    position: absolute;
    right: 0;
}
.bpp_shop_main_container .card .upcoming p{
    background-color: #3a6d3a;
    border-radius: 15px;
    border: 1px solid #3a6d3a;
    color: #fff;
    width: 110px;
    padding: 3px 0;
}
.bpp_shop_main_container .card .card-body img {
    margin-top: 20px;
}
.bpp_shop_main_container .card .card-footer{
    background: transparent;
    border: transparent;
    text-align: center;
}
.bpp_shop_main_container .card .card-footer h5{
    font-size: 24px;
    color: rgb(99, 99, 99);
}

/* <<<<<<<<<<<<< Style for bpp_shop_main_container end >>>>>>>>>>>>>>>> */
</style>

<body class="">