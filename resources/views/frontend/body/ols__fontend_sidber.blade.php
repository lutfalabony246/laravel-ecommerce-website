<div id="sidemenu-container" class="sidemenu-container">
    <ul id="category-toggle-custom-sidemenu" class="category-sidemenu">

        @php
        $special_offer = App\Models\Product::where('special_offer','1')->count();
        $coupons = App\Models\Coupon::orderBy('id', 'DESC')->count();
        @endphp
        <li class="menu-heading">
            <a href="{{ url('/special/offer') }}"><span class="text">Special Offers</span> <span class="number">{{
                    $special_offer }}</span></a>
            <a href="{{ route('coupon.view') }}"><span class="text">Coupon</span><span class="number">{{ $coupons
                    }}</span></a>
        </li>
        <li class="mb-1 mt-3">
            <div class="collapse">
                @php
                $currentUrl = url()->current();
                // dd($currentUrl);

                @endphp
                @php
                $categories=App\Models\Category::all();

                @endphp
                @foreach ($categories as $category)
        <li class="mb-1 mt-2">
            @if($currentUrl == route('user.index'))
            <a href="{{ url('/'. $category->category_slug_name) }}">
                @else
                @endif
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#cat{{$category->id}}" aria-expanded="false">
                    <img style="height:20px;width:20px" src="{{ asset($category->category_icon)}}" alt=""
                        class="sidemenu-icon">
                    {{$category->category_name}}
                </button>
            </a>
            @if($currentUrl == url('user.index'))
            @else
            @endif

            <div class="collapse" id="cat{{$category->id}}">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small sub-category">
                    @php
                    $subcategories=App\Models\SubCategory::with('category')->where('category_id',$category->id)->get();
             
                    @endphp
                    @foreach ($subcategories as $subcategory)
                    <li>
                        @if($currentUrl == url('/'. $category->category_slug_name))
                        <a
                            href="{{ url('/' . $subcategory->category->category_slug_name .'/'. $subcategory->sub_category_slug_name) }}">
                            @endif
                            <button class="btn btn-toggle align-items-center rounded collapsed"
                                data-bs-toggle="collapse" data-bs-target="#sub{{$subcategory->id}}"
                                aria-expanded="false">
                                {{$subcategory->sub_category_name}}
                            </button>
                            @if($currentUrl === url('/'. $category->category_slug_name))
                        </a>
                        @endif
                        <div class="collapse" id="sub{{$subcategory->id}}">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small sub-sub-category">
                                @php
                                $sub_subcategories=App\Models\SubSubCategory::with('category','subcategory')->where('subcategory_id',$subcategory->id)->get();
                                @endphp
                                @foreach ($sub_subcategories as $subsubcategory)
                                <li><a href="{{ url('/'.$subsubcategory->category->category_slug_name.'/'. $subsubcategory->subcategory->sub_category_slug_name.'/'. $subsubcategory->subsubcategory_slug_name) }}"
                                        class="link-dark rounded">{{$subsubcategory->subsubcategory_name}}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>
        </li>
        @endforeach
</div>
</li>


</ul>
</div>
