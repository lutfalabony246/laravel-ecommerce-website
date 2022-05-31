<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
    <div class="alldepartments_menu_wrap">
        <button class="alldepartments_btn bg_electronic_blue text-uppercase" type="button" data-toggle="collapse" data-target="#alldepartments_dropdown" aria-expanded="false" aria-controls="alldepartments_dropdown">
            <i class="far fa-bars"></i> All Departments
        </button>
        <div class="alldepartments_dropdown show_lg collapse" id="alldepartments_dropdown">
            <div class="card">
                <ul class="alldepartments_menulist ul_li_block clearfix">
                    @foreach ($categories as $category)

                    <li class="has_child">
                        <a href="#!">{{$category->category_name}}</a>
                        <div class="mega_menu pt-0">
                            <div class="container">
                                <div class="background" data-bg-color="#ffffff">
                                    <div class="row mt__30">
                                        @php
                                            $subcategories=App\Models\SubCategory::where('category_id',$category->id)->get();
                                        @endphp
                                        @foreach ($subcategories as $subcategory)
                                        <div class="col-lg-3">
                                            <div class="page_links">
                                                <h3 class="title_text">{{$subcategory->sub_category_name}}</h3>
                                                <ul class="ul_li_block">
                                                    @php
                                                        $sub_subcategories=App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->get();
                                                    @endphp
                                                    @foreach ($sub_subcategories as $subsubcategory)
                                                    <li><a href="{{ route('product.searchSubSubCategory',$subsubcategory->id) }}">{{$subsubcategory->subsubcategory_name}}</a></li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                        @endforeach


                                    </div>
                                </div>
                                <!-- mega_menu bg end -->
                            </div>
                        </div>
                    </li>
                    @endforeach




                </ul>
            </div>
        </div>
    </div>
</div>
