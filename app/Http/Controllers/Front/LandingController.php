<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Http\Request;
use App\Models\Front\Customer;
use App\Http\Controllers\Front\CustomerController;
use App\Models\ProductVariant;

class LandingController extends Controller {

    use MediaUploadingTrait;

    public $title = 'Home Page';

    protected function index(){
        
        $this->get_cart_items();
        $variant = ProductVariant::all();
        $featuredproduct = \App\Models\FeaturedProduct::with('featured_product')->get();
        $bannerimages = \App\Models\BannerSlider::where('bannerslider_status','=','1')->get();
        $categories = \App\Models\ProductCategory::with('GetProduct')->where('category_status','=','1')->get();
        $newproduct = \App\Models\Product::where('product_status','=','1')->orderBy('created_at','desc')->get();
         return view('front.landing',['title' => $this->title],compact('bannerimages','categories','newproduct','featuredproduct','variant'));
    }

    protected function get_cart_items()
    {
        if(session()->has('login_status')){

        $carts = Customer::where('uid','=',session()->get('userid'))
        ->pluck('cart_items')->toArray();
        
        if(!$carts || $carts[0] == null){
        }else{
            session()->put('cart_item',$carts);
        }
        }
    }
}
?>
