<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Http\Request;

class LandingController extends Controller {

    use MediaUploadingTrait;

    public $title = 'Home Page';

    protected function index(){

        $bannerimages = \App\Models\BannerSlider::where('bannerslider_status','=','1')->get();
        $categories = \App\Models\ProductCategory::with('GetProduct')->where('category_status','=','1')->get();
        $newproduct = \App\Models\Product::where('product_status','=','1')->orderBy('created_at','desc')->get();
         return view('front.landing',['title' => $this->title],compact('bannerimages','categories','newproduct'));
    }
}
?>
