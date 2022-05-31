<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactUsMail;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\ContactUs;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Subscriber;
use App\Models\review;
use App\Models\BannerCatagory;
use Illuminate\Support\Carbon;
use Devfaysal\BangladeshGeocode\Models\District;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Stripe\Review as StripeReview;
class IndexController extends Controller{

    // Islamic Website Home Page start
    public function islamic(){
        return view('frontend.index');
    }
    // Frontend Index show
    public function index()
    {
        // for  special_deals
        $special_deals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(6)->get();
        // for  Spacial Offer
        $special_offers = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(6)->get();
        // for  hot_deals
        $hot_deals = Product::where('hot_deals', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->limit(6)->get();
        // for featured
        $featureds = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
        // for product
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(8)->get();
        // for new product
        $newTwoproducts = Product::where('status', 1)->orderBy('id', 'DESC')->limit(2)->get();
        // for slider
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(10)->get();
        // end slider
        $categories = Category::withCount('products')->get();
        $most_popular_all = Product::where('status', 1)->limit(16)->get();
        // home page banner-category
        $banner1 = BannerCatagory::where('status', 1)->orderBy('id', 'DESC')->first();
        $banner2 = Banner::where('status', 1)->orderBy('id', 'DESC')->first();
        $todayDate = Carbon::now();
        $dailyBestSales =  DB::table('order_items')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->select('product_id', DB::raw('count(*) as total'), 'products.*')
            ->groupBy('product_id')
            ->orderBy('total', 'DESC')
            ->limit(18)
            ->get();
        $deliverdProducts =  OrderItem::select('product_id')->groupBy('product_id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->where('orders.status', 'delivered')
            ->get(['products.*']);
        $top_rated = DB::table('reviews')
            ->select('products.*', 'brands.brand_name_cats_eye')
            ->join('products', 'product_id', 'products.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->distinct('product_id')
            ->where('star', '>', 3)
            ->limit(8)
            ->get();
        $onsale = Order::select('products.*', 'brands.brand_name_cats_eye')->where('orders.created_at', '>', Carbon::now()->subHours(12)->toDateTimeString())
            ->where('orders.status', '=', 'delivered')
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->limit(8)
            ->get();
        $latest_products = Product::orderBy('id', 'DESC')->limit(3)->get();
        //   latest discount products
        $latestdiscountproduct = Product::whereNotNull('discount_price')->orderBy('id', 'DESC')->get();
        // top rated
        $toprated = review::where('star', '>=', 4)->select('product_id')->orderBy('star', 'DESC')->limit(4)->get();
        // for categories and total
        $trendingProducts = DB::table('order_items')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->select('*', 'product_id', DB::raw('count(*) as total'))
            ->groupBy('product_id')
            ->orderBy('total', 'DESC')
            ->limit(3)
            ->get();
        return view(
            'frontend.islamic', compact('categories','sliders', 'products','featureds','hot_deals','special_offers',
              'special_deals','banner2','latest_products','banner1','top_rated','newTwoproducts','dailyBestSales',
                'deliverdProducts','onsale','latestdiscountproduct','toprated','trendingProducts', 'most_popular_all'));
    }



    public function test()
    {
      // for  special_deals
        $special_deals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(6)->get();
        // for  Spacial Offer
        $special_offers = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(6)->get();
        // for  hot_deals
        $hot_deals = Product::where('hot_deals', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->limit(6)->get();
        // for featured
        $featureds = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
        // for product
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(8)->get();
        // for new product
        $newTwoproducts = Product::where('status', 1)->orderBy('id', 'DESC')->limit(2)->get();
        // for slider
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(10)->get();
        // end slider
        $categories = Category::all();
        // home page banner-category
        $banner1 = BannerCatagory::where('status', 1)->orderBy('id', 'DESC')->first();
        $banner2 = Banner::where('status', 1)->orderBy('id', 'DESC')->first();
        $todayDate = Carbon::now();
        $dailyBestSales =  DB::table('order_items')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->select('product_id', DB::raw('count(*) as total'), 'products.*')
            ->groupBy('product_id')
            ->limit(14)
            ->orderBy('total', 'DESC')
            ->get();

        $deliverdProducts =  OrderItem::select('product_id')->groupBy('product_id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->where('orders.status', 'delivered')
            ->get(['products.*']);
        $top_rated = DB::table('reviews')
            // ->select('products.*', 'brands.brand_name_cats_eye')
            ->join('products', 'product_id', 'products.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->distinct('product_id')
            ->where('star', '>', 3)
            ->limit(8)
            ->get();

        $onsale = Order::select('products.*', 'brands.brand_name_cats_eye')->where('orders.created_at', '>', Carbon::now()->subHours(12)->toDateTimeString())
            ->where('orders.status', '=', 'delivered')
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->limit(8)
            ->get();
        $latest_products = Product::orderBy('id', 'DESC')->limit(4)->get();
        //   latest discount products
        $latestdiscountproduct = Product::whereNotNull('discount_price')->orderBy('id', 'DESC')->get();
        // top rated
        $toprated = review::where('star', '>=', 4)->select('product_id')->orderBy('star', 'DESC')->limit(3)->get();

    }
    public function GetCategory()
    {
        return view('frontend.category.category');
    }
    // Home Page Top Search Bar Start
    public function searchProduct(Request $request)
    {
        $category = Category::find($request->category_id);
        if (!$category) {
            $notification = array(
                'message' =>  'Category Not Found',
                'alert-type' => 'error'
            );
            return redirect()->route('dashboard')->with($notification);
        }

        $query  = Product::query();
        $products = $query->where('category_id', $category->id)
            ->where(function ($query) use ($request) {
                $query->orWhere('product_name', 'like', "%{$request->input('searchValue')}%")
                    ->orWhere('product_code', 'like', "%{$request->input('searchValue')}%")
                    ->orWhere('product_size', 'like', "%{$request->input('searchValue')}%")
                    ->orWhere('product_color', 'like', "%{$request->input('searchValue')}%")
                    ->orWhere('selling_price', 'like', "%{$request->input('searchValue')}%");
            })->get();
        return view('frontend.category.searchProduct', compact('products'));
    }
     public function searchByProductName(Request $req)
    {
        $search_str = $req->squery;
        $productName= DB::table('products')
        ->join('brands', 'products.brand_id', 'brands.id')
        ->join('categories', 'products.category_id', 'categories.id')
        ->join('sub_categories', 'products.sub_category_id', 'sub_categories.id')
        ->select('products.*', 'brand_name_cats_eye', 'category_name', 'category_slug_name', 'sub_category_slug_name')
        ->where("products.product_name" ,'LIKE' ,'%' . $search_str . '%')
        ->orWhere("categories.category_name" ,'LIKE' ,'%' . $search_str . '%')
        ->orWhere("brands.brand_name_cats_eye" ,'LIKE' ,'%' . $search_str . '%')
        ->get();
        //dd($productName);
        $search_result = '';
        if(count($productName)>0){
        foreach ($productName as $key => $value) {
            $myhref=route('ProductDetails',[$value->category_slug_name,$value->sub_category_slug_name,$value->product_slug_name]);

            $search_result .= ' <a href="' .$myhref. '" class="list-group-item list-group-item-action">'.$value->product_name.'</a>';
        }
        }else{
            $search_result = '<h5 style="margin-top: 8px; text-align: left; font-size: 18px;color: black;">No Product Found</h5>';
        }
        return $search_result;

    }


      public function searchByProductNameView(Request $req)
    {
        $search_str = $req->searchValue;
        $products= DB::table('products')
        ->join('brands', 'products.brand_id', 'brands.id')
        ->join('categories', 'products.category_id', 'categories.id')
        ->select('products.*', 'brand_name_cats_eye', 'category_name')
        ->where("products.product_name" ,'LIKE' ,'%' . $search_str . '%')
        ->orWhere("categories.category_name" ,'LIKE' ,'%' . $search_str . '%')
        ->orWhere("brands.brand_name_cats_eye" ,'LIKE' ,'%' . $search_str . '%')
        ->get();


        return view('frontend.product.search', compact('products'));
    }










    // user logout
    public function UserLogout()
    {
        Auth::logout();
        return redirect()->route('dashboard');
    }
    // user Profile Update
   public function UserProfile()
    {
        $district = District::all();
        // what is id = specify  user and use find id
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.profile.user_profile', compact('user','district'));
    }

    // User Profile Store
    public function UserProfileStore(Request $request)
    {

        // Auth login user id is find
        $validateData = $request->validate([
            'name' => 'required',
            // 'email' => 'required',
            // 'gender' => 'required',
            // 'date_of_birth' => 'required',
            'phone' => 'required|numeric',
            // 'profile_photo_path' => 'required',
        ]);
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->gender = $request->gender;
        $data->date_of_birth = $request->date_of_birth;


        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/users_images/' . $data->profile_photo_path));

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/users_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' =>  'Your Profie Update Sucessfully',
            'alert-type' => 'success'
        );


        return redirect()->route('user.profile')->with($notification);
    }
    // user password change
    public function UserChnagePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }
    // User Update Password
    public function UserPasswordUpdate(Request $request)
    {

        $validateData = $request->validate([
            'oldpassword' => 'required|min:6|max:12',
            'password' => 'required|min:6|max:12confirmed',
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();

            $notification = array(
                'message' =>  'Your Passowrd Update Successfully',
                'alert-type' => 'success',
            );

            //Auth::logout();
            return redirect()->route('user.password.update')->with($notification);
        } else {

            $notification = array(
                'message' =>  'New Password did not matched',
                'alert-type' => 'warning',
            );
            return redirect()->route('user.password.update')->with($notification);
        }
    }  // end mahod
      // product_detalis
    // public function ProductDetails($cat_slug,$subcat_slug,$subsubcat_slug,$slug)
      public function ProductDetails($cat_slug,$subcat_slug,$slug)
    {

        // for multi img show
        $product = Product::where('product_slug_name',$slug)->first();
        //  $product = Product::where('id', $id);
        Product::find($product->id)->increment('product_views');
        $product_color = $product->product_color;
        $product_color_all = explode(',', $product_color);
        $product_size = $product->product_size;
        $product_size_all = explode(',', $product_size);
        // for related product show
        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id', $cat_id)->where('id', '!=', $product->id)->orderBy('id', 'DESC')->get();
        $multiimgs =  MultiImg::where('product_id', $product->id)->limit(4)->get();

        $reviews = review::where('product_id', $product->id)->with('user')->orderBy('id', 'DESC')->get();


        return view('frontend.product.product_detalis', compact(

            'product',
            'multiimgs',
            'product_color_all',
            'product_size_all',
            'relatedProduct',
            'reviews'
        ));
    } // end mathod
    // for check end


    public function TagWiseProduct($tag)
    {
        // for tag page
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $products = Product::where('status', 1)->where('product_tags', $tag)->orderBy('id', 'DESC')->paginate(4);
        return view('frontend.tags.tags_view', compact('products', 'categories'));
    }
    // Subcategory wise data
    public function SubCatWiseProduct($subcat_id)
    {

        $breadsubcat = SubCategory::with(['category'])->where('id', $subcat_id)->get();
        $products = Product::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'DESC')->paginate(4);
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return view('frontend.product.subcategory_view', compact('products', 'categories', 'breadsubcat'));
    }
    // Subcategory wise data
    public function SubSubCatWiseProduct($subsubcat_id)
    {
        $products = Product::where('status', 1)->where('sub_sub_category_id', $subsubcat_id)->orderBy('id', 'DESC')->paginate(4);
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $breadsubsubcat = SubSubCategory::with(['category', 'subcategory'])->where('id', $subsubcat_id)->get();
        return view('frontend.product.sub_subcategory_view', compact('products', 'categories', 'breadsubsubcat'));
    }
    /// Product View With Ajax
    public function ProductViewAjax($id)
    {
        $product = Product::with('category','subcategory','subsubcategory')->findOrFail($id);
        $review = Review::where('product_id', $id)->get()->first();
        $users = Review::where('product_id', $id)->count();
        $multiimgs =  MultiImg::where('product_id',$id)->limit(6)->get();
        $color = $product->product_color;
        $product_colors = explode(',', $color);
        $size = $product->product_size;
        $product_sizes = explode(',', $size);
        $reviews = review::where('product_id', $product->id)->with('user')->orderBy('id', 'DESC')->get();

        return response()->json(array(
            'product' => $product,
            'review' => $review,
            'color' => $product_colors,
            'size' => $product_sizes,
            'users' => $users,
            'multiimgs'=>$multiimgs,
            'reviews' => $reviews
        ));
    } // end mathod
    // Product Seach By Name Start
    public function ProductSearch(Request $request)
    {
        if (isset($request->cat)) {
            $categories = $request->cat;
        }
        if (isset($request->search)) {
            $item = $request->search;
        }
        if (isset($item) && !isset($categories)) {
            $products = Product::where('product_name', 'LIKE', "%$item%")->paginate(9);
            $category = "0";
            return view('frontend.product.search', compact('products', 'category'));
        } else if (!isset($item) && isset($categories)) {
            if ($request->cat == 0) {
                $products = Product::all();
            } else {
                $products = Product::where('category_id', '=', $categories)->paginate(9);
            }

            $category = "0";
            return view('frontend.product.search', compact('products', 'category'));
        } else if (isset($item) && isset($categories)) {
            $products = Product::where('category_id', '=', $categories)->where('product_name', 'LIKE', "%$item%")->paginate(9);
            $category = "0";
            return view('frontend.product.search', compact('products', 'category'));
        }
        return redirect()->route('user.index');
    }
   // Product Seach by name End
    // Product By Color  Start
    public function searchByColor($color)
    {
        $products  = Product::where('product_color', 'like', '%' . $color . '%')->paginate(6);
        return view('frontend.product.search', compact('products'));
    }
      // Product By Color  End
     // Product By Category  Start
    public function searchByCategory($category)
    {
        $subcategory_id = $category;
        $products  = Product::where('subcategory_id', $subcategory_id)->paginate(6);
        return view('frontend.product.search', compact('products'));
    }
    // Product By Color  End
    public function categoryByProduct($category)
    {
        $category_id = $category;
        $products  = Product::where('category_id', $category_id)->paginate(6);
        return view('frontend.product.search', compact('products'));
    }
    public function searchBySubSubCategory($category)
    {
        $subsubcategory_id = $category;
        $subsubcategory = SubSubCategory::find($subsubcategory_id);
        $subcategory = SubCategory::find($subsubcategory->subcategory_id);
        $category = Category::find($subcategory->category_id);

        $products  = Product::where('sub_sub_category_id', $subsubcategory_id)->paginate(6);
        return view('frontend.product.search', compact('products', 'subsubcategory', 'subcategory', 'category'));
    }
    public function latestProduct()
    {
        $products = Product::latest()->limit(30)->paginate(9);
        return view('frontend.product.search', compact('products'));
    }
    public function allProduct()
    {
        $products = Product::limit(30)->paginate(9);
        return view('frontend.product.search', compact('products'));
    }
    public function popularProduct()
    {
        $products = Product::where('status', 1)->orderBy('product_views', 'DESC')->limit(30)->paginate(9);
        return view('frontend.product.search', compact('products'));
    }
    public function specialOffer()
    {
        $products = Product::where('special_offer', '1')->limit(30)->paginate(9);
        return view('frontend.product.search', compact('products'));
    }
    public function specialDeal()
    {
        $products = Product::where('special_deals', '1')->limit(30)->paginate(9);
        return view('frontend.product.search', compact('products'));
    }
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:subscribers|max:255',
        ]);
        if ($validated) {
            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->save();

            return redirect()->back()->with('message', 'Thanks For Subscribe');
        }
    }


    public function review(Request $request, $id)
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        } else {
            $validated = $request->validate([
                'review' => 'required|max:255'
            ]);


            if ($validated) {
                $review = new review();
                $review->review = $request->review;
                $review->product_id = $id;
                $review->user_id = Auth::id();
                $review->quality = $request->quality;
                $review->price = $request->price;
                $review->value = $request->value;
                $review->save();
                $notification = array(
                    'message' =>  'Thank you for your rating.',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
    }


    public function contactUs(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:30',
            'email' => 'required',
            'subject' => 'required|max:60',
            'subject' => 'required|max:60',
            'message' => 'required|max:255',
        ]);
        if ($validated) {
            $contact  = new ContactUs();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();
            $notification = array(
                'message' =>  'We will response you very soon, Thank you',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function createAccount()
    {
        return view('auth.register');
    }
    public function CategoryView()
    {
        $getcategory = Category::get();
        $newest = $getcategory->pluck('id');
        return view('frontend.category.category', compact('getcategory','newest'));
    }

     public function SubCategoryView($cat_slug)
    {
        $cat=Category::where('category_slug_name',$cat_slug)->first();
        $getsubcategory1 = SubCategory::where('category_id', $cat->id)->distinct('category_id')->get();
        $getsubcategory = SubCategory::with('category')->where('category_id', $cat->id)->get();
        $newest=SubCategory::where('category_id', $cat->id)->first();
        return view('frontend.category.sub_category', compact('getsubcategory', 'getsubcategory1','newest'));
    }


    public function SubSubCategoryView12($cat_slug,$subcat_slug)
    {
      $subcat22=SubCategory::where('sub_category_slug_name',$subcat_slug)->first();
        $subsubcategories= SubSubCategory::where('subcategory_id', $subcat22->id)->with('category','subcategory')->get();
        $productUnderSubCategory = Product::where('sub_category_id',$subcat22->id)->where('sub_sub_category_id',null)->get();
         $productUnderSubCategory1 = Product::where('sub_category_id',$subcat22->id)->first();
        $getsubsubcategory1 = Product::where('sub_sub_category_id', $subcat22->id)->select('sub_sub_category_id','sub_category_id')->distinct('sub_sub_category_id')->get();

        return view('frontend.category.sub_sub_category', compact( 'subsubcategories','productUnderSubCategory','getsubsubcategory1','productUnderSubCategory1'));
    }


// working so far so good
    public function GetProductView1($cat_slug,$subcat_slug,$subsubcat_slug)
    {
         $subsubcat=SubSubCategory::where('subsubcategory_slug_name',$subsubcat_slug)->first();
        $getproductsub = Product::where('sub_sub_category_id', $subsubcat->id)->with('category','subcategory','subsubcategory')->get();
        $getproductsub1 = Product::where('sub_sub_category_id', $subsubcat->id)->with('category','subcategory','subsubcategory')->first();
        return view('frontend.category.getproduct', compact( 'getproductsub','getproductsub1'));
    }


    public function GetProductsSort($id)
    {

        return Product::where('sub_sub_category_id', $id)->orderBy('id','ASC')->get();
    }
    public function GetProductsSort2($id)
    {

        return Product::where('sub_category_id', $id)->orderBy('id','ASC')->get();
    }
    public function GetFilteredProducts(Request $request)   {

           $querys=Product::where('sub_sub_category_id', $request->subCategory)
        ->where(function($query) use ($request)
        {
            $query->whereBetween('selling_price',[$request->minPrice, $request->maxPrice])
            ->where('discount_price','=',NULL);
        })
        ->orWhere(function($query) use ($request)
        {
            $query->whereBetween('discount_price',[$request->minPrice, $request->maxPrice])
            ->where('discount_price','!=',NULL);
        })
        ->get();

        return response()->json($querys);
    }

    public function GetFilteredProducts2(Request $request){

        $querys=Product::where('sub_category_id', $request->subCategory)
        ->where(function($query) use ($request)
        {
            $query->whereBetween('selling_price',[$request->minPrice, $request->maxPrice])
            ->where('discount_price','=',NULL);
        })
        ->orWhere(function($query) use ($request)
        {
            $query->whereBetween('discount_price',[$request->minPrice, $request->maxPrice])
            ->where('discount_price','!=',NULL);
        })
        ->get();

        return response()->json($querys);
    }

    public function Sidebar()
    {
        $category = Category::get();
        return view('frontend.body.fontend_sidber', compact('category'));
    }

    public function getSubCategoryForSidebar($id)
    {
        $subItems = SubCategory::where('category_id', $id)->get();
        return response()->json($subItems);
    }
    public function getSubSubCategoryForSidebar($id)
    {
        $subItems = SubSubCategory::where('subcategory_id', $id)->get();
        return response()->json($subItems);
    }
    public function getSubSubSubCategoryForSidebar($id)
    {
        $subItems = Product::where('sub_sub_category_id', $id)->get();
        return response()->json($subItems);
    }

    public function LatestDiscountedProducts()
    {
        $latest = Product::get();
        return view('frontend.product.latestdiscountedproducts', compact('latest'));
    }
    public function Offer()
    {
        return view('frontend.product.specialoffer');
    }

    public function Coupon(){
        return view('frontend.common.coupon');
    }
    // filtering category
    public function get_causes_against_category($id)
    {
        $data = Category::where('id', $id)->select('category_name', 'id','category_image')
        ->first();
    return response()->json($data);
    }
    // filtering sub category
    public function  get_causes_against_subcategory($id)
    {
        $data = SubCategory::where('id', $id)->select('sub_category_name', 'id', 'subcategory_image', 'sub_category_slug_name')
        ->first();
    return response()->json($data);
    }
      // filtering category
      public function get_causes_against_subsubcategory($id)
      {
          $data = SubSubCategory::where('id', $id)->select( 'id','subsubcategory_name','subsubcategory_image')
          ->first();
           return response()->json($data);
      }
      public function get_causes_against_categorysort()
      {
          $data = Category::orderBy('id','DESC')->get();
           return response()->json($data);
      }
      public function get_causes_against_subcategorysort($id)
      {
        $data = SubCategory::where('category_id', $id)->get();
        return response()->json($data);
      }
      public function get_causes_against_subsubcategorysort($id)
      {
        $data = SubSubCategory::where('subcategory_id', $id)->get();
        return response()->json($data);
      }
      //error page
      public function ErrorPage(){
        return view('frontend.common.errorage');
    }



// --------------------------test-------------------
public function SupplierDataShowAll(){
    $supplier = MultiImg::all();
    return response( $supplier);
}

} // main end

