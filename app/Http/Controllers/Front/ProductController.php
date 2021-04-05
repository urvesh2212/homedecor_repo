<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Http\Request;
use App\Http\Requests\Front\AddToCartRequest;
use App\Models\ProductCategory;
use App\Models\ProductSubType;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Brand;


class ProductController extends Controller
{

    public function __Construct()
    {
        $this->category = ProductCategory::all();
        $this->subcategory = SubCategory::all();
        $this->product = Product::all();
        $this->brand = Brand::all();
    }   

    public function ShowProdcutByCategory()
    {
        $brand = $this->brand;      

        $productdetails = ProductCategory::with('GetSubCat','GetProduct')->where('category_status','=','1')->get();
    
        $categorydata = request()->segment(4);
        
        foreach ($productdetails as $key) {
            if($categorydata === $key->category_name)
            {
                $brandcollection = collect($key->GetProduct);
                $uniquebrand = $brandcollection->unique('brand_id');
               return view('front.shop-sidebar',['title' => 'Shop Catalog'],compact('productdetails','categorydata','brand','uniquebrand'));
            }else{
            }
        }
    }

    public function singleproduct()
    {
        $productid = request()->segment(2);
        $productname = request()->segment(3);

        $productdata = Product::with('SubTypeProductid','brandid')
        ->where('id','=',$productid)
        ->where('product_status','=','1')->get();

        $relatedproducts = Product::with('catid','brandid')
        ->where('product_status','=','1')
        ->where('subcatid_id','=',$productdata[0]->subcatid_id)
        ->get();

        return view('front.singleproduct',['title' => str_ireplace('-',' ',$productname)],compact('productdata','relatedproducts'));
    }

    public function Add_To_Cart(AddToCartRequest $req)
    {
        if($req->ajax())
        {
            $product_hsn = strip_tags($req->input('productid'));

            $checkdata = ProductSubType::where('product_subtype_status','=','1')
            ->where('hsn_code','=',$product_hsn)
            ->first();

            if(!is_null($checkdata))
            {
                session(['productdata' => $product_hsn]);
                return json_encode(['msg' => 'Product Added Successfully','status' => 200]);
            }else{
                return json_encode(['msg' => 'Error While Adding data','status' => 500]);
            }
        }
        return json_encode(['msg' => 'Error.Try Again','status' => 500]);
    }
}
?>