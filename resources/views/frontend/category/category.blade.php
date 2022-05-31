@extends('frontend.main_master')
@section('islamic')
<section class="main-content" id="main-content">
    <div class="container-fluid profile px-md-5 px-3 mt-3">
        <!--~~~~~~category page banner starts~~~~~~-->
        <section class="category01--banner">
            <div class="row">
                <div class="col-12">
                    <div class="category01--banner-wrap d-flex justify-content-center">
                        <img src=" {{ asset('frontend/assets/images/category/cat-banner.png') }} " alt=""
                            style="height: 100px;">
                    </div>
                </div>
            </div>
        </section>
        <!-- product category starts -->
        <section class="product--category">
            <div class="container-fluid">

                <!-- breadcrumb start -->
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb category-breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a
                                href="{{ route('category.view') }}">All Category</a></li>
                    </ol>
                </nav>
                <!-- breadcrumb end -->
                <!-- ~~~~filter button starts~~~~~ -->
                <section class="filter--section mt-5 mb-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="filter--contain">
                                    <span id="dots"></span>
                                </div>
                            </div>
                        </div>
                        <form action="">
                            <div class="filter-options my-4 p-2 p-md-5" id="more">
                                <div class="row">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h4>By Categories</h4>
                                            @php
                                            $category = App\Models\Category::get();
                                            @endphp
                                            @foreach ($category as $cat)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" attr-name="{{ $cat->category_name }}"
                                                    class="custom-control-input category_checkbox1" id="{{ $cat->id }}">
                                                <label class="custom-control-label" for="{{ $cat->id }}">{{
                                                    ucfirst($cat->category_name) }}</label>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>

                                </div>
                                <div class="mt-3">
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
                <!-- ~~~~filter button ends~~~~~ -->


                <div class="col-md-6 p-2 d-md-flex justify-content-md-end">
                </div>
                <!-- product ietm starts  -->
                <div class="product_items generaldata">
                    <div id="category_view_cont" class="ec-card-group cause_parent">
                        @foreach ($getcategory as $category)
                        <div id="subcategoryShow{{ $category->id }}" class="ec-card-lg categoryBox subCategroyCard">
                            <a href="{{ url('/bs/'. $category->category_slug_name) }}">

                                <div class="ec-card-inner text-center">
                                    <img class="img-fluid" src=" {{ $category->category_image }} " alt="">
                                    <p>{{ $category->category_name }}</p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="causes_div">
                    </div>
                    <div class="container-fluid">
                    </div>
                </div>
                {{-- for newest --}}
                <div class="generaldata">
                </div>

            </div>
            <!-- product ietm edns  -->
            <!-- end product--category--items--inner  -->
        </section>
    </div>
</section>
@endsection
@section('script')
<script>
    var subCategroyCardCount = 0;

    $('.category_checkbox1').on('click',function()
    {
        var id = $(this).attr('id');

        if($(this).is(":checked"))
        {
            if(subCategroyCardCount == 0)
            {
                $('.subCategroyCard').hide(500);
                subCategroyCardCount++;
            }

            $(`#subcategoryShow${id}`).show(500);
            console.log(`#subcategoryShow${id}`);
        }
        else{
            $('.generaldata').show();
        }

        if($(this).is(":not(:checked)"))
        {
            $(`#subcategoryShow${id}`).hide(500);
            console.log(`#subcategoryShow${id}`);
            // $('.cause_parent').show(500);

        }

    });
   $('.reset').on('click',function()
    {
        $('.subCategroyCard').show(500);
    });
</script>
{{-- for sorting --}}
    <script>
        $(document).ready(function() {

            const renderResponseToCategory = (response) => {
                let category_view_cont_html = '';
                response.forEach(category => {
                    let categoryHtml =
                        `
                                    <div class="ec-card-lg categoryBox">
                                        <a href="sub_category_view/${category.id}">
                                            <div class="ec-card-inner text-center">
                                                <img class="img-fluid" src="${category.category_image}" alt="">
                                            <p>${category.category_name}</p>
                                        </div>
                                    </a>
                                </div>
                                `;
                    category_view_cont_html = category_view_cont_html + categoryHtml;
                });

                $('#category_view_cont').html(category_view_cont_html);
            }

            $('#select_sort_by').change(function() {
                const selectedValue = $('#select_sort_by').val();
                $.ajax({
                    type: 'GET',
                    url: '/get_causes_against_categorysort',
                    success: function(response) {
                        console.log(response);
                        if (selectedValue === 'alphabhatic_a-z') {
                            function alphabhaticReorder(a, b) {
                                if (a.category_name < b.category_name) {
                                    return -1;
                                }
                                if (a.category_name > b.category_name) {
                                    return 1;
                                }
                                return 0;
                            }
                            response.sort(alphabhaticReorder);
                            renderResponseToCategory(response);
                        } else if (selectedValue === 'alphabhatic_z-a') {
                            function alphabhaticReorder(a, b) {
                                if (a.category_name > b.category_name) {
                                    return -1;
                                }
                                if (a.category_name < b.category_name) {
                                    return 1;
                                }
                                return 0;
                            }
                            response.sort(alphabhaticReorder);
                            renderResponseToCategory(response);
                        }
                    }
                });
            });


            $('#select_sort_by').change(function() {
                const selectedValue = $('#select_sort_by').val();
                $.ajax({
                    type: 'GET',
                    url: '/get_causes_against_categorysort',
                    success: function(response) {
                        console.log(response);
                        if (selectedValue === 'alphabhatic_a-z') {
                            function alphabhaticReorder(a, b) {
                                if (a.category_name < b.category_name) {
                                    return -1;
                                }
                                if (a.category_name > b.category_name) {
                                    return 1;
                                }
                                return 0;
                            }
                            response.sort(alphabhaticReorder);
                            renderResponseToCategory(response);
                        } else if (selectedValue === 'alphabhatic_z-a') {
                            function alphabhaticReorder(a, b) {
                                if (a.category_name > b.category_name) {
                                    return -1;
                                }
                                if (a.category_name < b.category_name) {
                                    return 1;
                                }
                                return 0;
                            }
                            response.sort(alphabhaticReorder);
                            renderResponseToCategory(response);
                        }
                    }
                });
            });

      
        });
    </script>
@endsection
