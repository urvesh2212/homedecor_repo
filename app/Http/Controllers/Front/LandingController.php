<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller {

    public $title = 'Home Page';

    protected function index(){

         return view('front.landing',['title' => $this->title]);
    }
}
?>
