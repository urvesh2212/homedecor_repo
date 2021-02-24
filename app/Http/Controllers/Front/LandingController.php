<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class LandingController extends Controller {

    public $title = 'Home Page';

    protected function index(){

        $categories = ProductCategory::orderby('category_name')->get()->pluck('category_name','id');

         return view('front.landing',['title' => $this->title,'categories'=> $categories]);
    }
}
?>
