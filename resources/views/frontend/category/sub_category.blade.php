

@extends('frontend.main_master')
@section('islamic')

<!-- product category starts -->

<section class="main-content" id="main-content">
    <div class="container-fluid px-md-5 px-3 mt-3">
        <!--~~~~~~category page banner starts~~~~~~-->
        <div class="category01--banner">
            <div class="row">
                <div class="col-lg-6 col-md-6 com-sm-12">
                    <div class="subcat_banner_img h-100">
                        <div class="wrap_left h-100">
                            <img src=" {{ asset('frontend/assets/images/category/sub-cat/sub_sub_cat1.png') }} " alt=""
                                class="img-fluid w-100 h-100">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 com-sm-12">
                    <div class="subcat_banner_img h-100">
                        <div class="wrap_right h-100">
                            <img src=" {{ asset('frontend/assets/images/category/sub-cat/sub_sub_cat2.png') }} " alt=""
                                height="100px" class="img-fluid w-100 h-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product category starts -->
        <section class="product--category">
            <div class="container-fluid">

                <!-- breadcrumb start -->
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb category-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a
                                href="{{ route('category.view') }}">All Category</a></li>


                        @php
                        $subCategory = optional($getsubcategory1->first())->category_id;
                        @endphp
                        <input id="subCategory" type="hidden" value="{{ $subCategory }}">
                    </ol>
                </nav>
                <!-- breadcrumb end -->

                <!-- product ietm starts  -->
                <div class="product_items">
                    <div id="category_view_cont" class="ec-card-group cause_parent">
                        @forelse($getsubcategory as $subcategory)
                        <div id="subcategoryShow{{ $subcategory->id }}" class="ec-card-lg subCategroyCard">
                            <a
                                href="{{ url('/bs/' . $subcategory->category->category_slug_name .'/'. $subcategory->sub_category_slug_name) }}">
                                <div class="ec-card-inner">
                                    <img class="img-fluid" src="{{ asset($subcategory->subcategory_image) }} " alt="">
                                    <p>{{ $subcategory->sub_category_name }}</p>
                                </div>
                            </a>
                        </div>
                        @empty
                        <h4>Not Found</h4>
                        @endforelse
                    </div>
                    <div class="causes_div">
                    </div>
                    <div class="container-fluid">
                    </div>
                </div>
            </div>
            <!-- product ietm edns  -->
            <!-- end product--category--items--inner  -->
        </section>
    </div>
</section>
</div>

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

        if($(this).is(":not(:checked)"))
        {
            $(`#subcategoryShow${id}`).hide(500);
            console.log(`#subcategoryShow${id}`);
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
                                <a href="/${category.category_slug_name}">
                                <div class="ec-card-inner text-center">
                                    <img class="img-fluid" src="../../${category.subcategory_image}" alt="">
                                <p>${category.sub_category_name}</p>
                            </div>
                        </a>
                    </div>
                    `;
                    category_view_cont_html = category_view_cont_html + categoryHtml;
                });

                $('#category_view_cont').html(category_view_cont_html);
            }

            $('#select_sort_by').change(function() {
                // const selectedValue = $('#select_sort_by').find(":selected").text();
                var selectedValue = $('#select_sort_by').val();
                const subCategory = $('#subCategory').val();

                $.ajax({
                    type: 'GET',
                    url: `/get_causes_against_subcategorysort/${subCategory}`,
                    success: function(response) {
                        if (selectedValue === 'alphabhatic_a-z') {
                            function alphabhaticReorder(a, b) {
                                if (a.sub_category_name < b.sub_category_name) {
                                    return -1;
                                }
                                if (a.sub_category_name > b.sub_category_name) {
                                    return 1;
                                }
                                return 0;
                            }
                            response.sort(alphabhaticReorder);
                            renderResponseToCategory(response);
                        } else if (selectedValue === 'alphabhatic_z-a') {
                            function alphabhaticReorder(a, b) {
                                if (a.sub_category_name > b.sub_category_name) {
                                    return -1;
                                }
                                if (a.sub_category_name < b.sub_category_name) {
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










