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
use App\Models\OfferProduct;
use App\Models\Front\CustomerAddress;
use App\Models\FeedbackView;


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

        $categorydata = request()->segment(4);

        $categorycode = request()->segment(3);

        $productdetails = ProductCategory::with('GetSubCat','GetProduct','GetBrand')
        ->where('category_status','=','1')
        ->where('category_code','=',$categorycode)
        ->get();
        
        $brandcollection = collect($productdetails[0]->GetBrand);
        $brands = $brandcollection->unique('id');
    
        return view('front.shop-sidebar',['title' => 'Shop Catalog'],compact('productdetails','brands'));
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

    public function offerproducts()
    {
        $offerslug = request()->segment(2);
        $offerproducts = OfferProduct::with('offer_product','offer_product.catid','offer_product.catid.GetSubCat','offer_product.brandid')
        ->where('offer_product_status','=','1')
        ->paginate(2);
        
        foreach ($offerproducts as $key) {
            $cat[] = $key->offer_product->catid;
            $brand[] = $key->offer_product->brandid;
        }

        $categorydata = collect($cat)->unique('id');
        $branddata = collect($brand)->unique('id');
        
        return view('front.shop-sidebar-offerproduct',['title' => $offerslug],compact('offerproducts','categorydata','branddata'));
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
                 $cart = $req->session()->get('cart_item');
                
                if(!$cart){
                    $cart = [
                        $product_hsn => [
                            'qty' => 1,
                        ],
                    ];

                 $req->session()->put('cart_item',$cart);

                 $cartcount = count(session('cart_item'));

                return json_encode(['msg' => 'Product Added Successfully','status' => 200,'cartcount' => $cartcount]);

                }elseif(isset($cart[$product_hsn])){

                    $cart[$product_hsn]['qty']++;
                    $req->session()->put('cart_item', $cart);
                    $cartcount = count(session('cart_item'));

                    return json_encode(['msg' => 'Product Added Successfully','status' => 200,'cartcount' => $cartcount]);
                }else{
                    $cart[$product_hsn] = [
                        'qty' => 1,
                    ];

                    $req->session()->put('cart_item',$cart);
                    $cartcount = count(session('cart_item'));
                    return json_encode(['msg' => 'Product Added Successfully','status' => 200,'cartcount' => $cartcount]);
                }

            }else{
                $cartcount = count(session('cart_item'));
                return json_encode(['msg' => 'Error While Adding data','status' => 500,'cartcount' => $cartcount]);
            }
        }
        $cartcount = count(session('cart_item'));
        return json_encode(['msg' => 'Error.Try Again','status' => 500,'cartcount' => $cartcount]);
    }

    public function remove_cart(Request $req)
    {
        if($req->ajax()){
            if($req->session()->has('cart_item'))
            {
                $removeproductdata = strip_tags($req->input('productid'));
                $req->session()->forget('cart_item.'.$removeproductdata);
                if(empty($req->session()->get('cart_item')))
                {
                    $req->session()->forget('cart_item');
                }

                return json_encode(['msg' => 'Product Successfully Removed','status'=> 200]);
            }else{
                return json_encode(['msg' => 'No Cart Found','status'=> 500]);
            }
        }
        else{
            return json_encode(['msg' => 'Invalid Request','status'=> 500]);
        }
    }

    public function show_cart(Request $req)
    {
        if($req->session()->has('cart_item')){

        $getproducts = $this->populate_cart();
        $customeraddress = $this->get_address();

        return view('front.cartpagecontent.cart',['title' => 'Cart'],compact('getproducts','customeraddress'));
        }else{
        
            return redirect()->route('homepage');
        }
    }

    protected function populate_cart()
    {
        $cartdata = session()->all();
        $pcode = array_keys($cartdata['cart_item']);
        
        return ProductSubType::with('productid','productvariantid')
        ->whereIn('hsn_code',$pcode)
        ->get();
    }

    protected function get_address()
    {
        $customerid = session()->get('userid');
        return CustomerAddress::with('customeraccount')->get();       
    }

    public function add_feedback(Request $req)
    {
        if($req->ajax() && $req->session()->has('login_status'))
        {
            $feedback = FeedbackView::create([
                'customerfeedback_email' => $req->email,
                'description' => $req->review,
                'rating' => $req->rating,
                'product_id' => $req->pid,
                'customerid' => $req->session->get('userid'),
            ]);

            if($feedback){
                return json_encode(['msg' => 'yo','status'=>200]);
            }else{
                return json_encode(['status'=>500]);
            }
        }
        return false;
    }
}

?>