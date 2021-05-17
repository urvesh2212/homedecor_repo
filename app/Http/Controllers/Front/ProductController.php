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
use App\Models\ManageCoupon;
use App\Models\Front\Customer;
use App\Traits\StoreCartDetails;

class ProductController extends Controller
{
    use StoreCartDetails;

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

        $productdata = Product::with('SubTypeProductid','brandid','product_review','product_review.customers')
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
                
                if($req->session()->has('cart_item')){
                    $cartdata = $req->session()->get('cart_item');
                if(array_key_exists($product_hsn,$cartdata)){
                    $cartdata[$product_hsn]['qty']++;
                    $req->session()->put('cart_item', $cartdata);
                    
                    if($req->session()->has('login_status'))
                    {
                    $this->store_cart_data();
                    }

                $cartcount = count(session('cart_item'));

                return json_encode(['msg' => 'Product Updated Successfully','status' => 200,'cartcount' => $cartcount]);

                }else{  
                    $cartdata[$product_hsn] = [
                        'qty' => 1,
                    ];

                    $req->session()->put('cart_item',$cartdata);

                    if($req->session()->has('login_status'))
                    {
                    $this->store_cart_data();
                    }

                $cartcount = count(session('cart_item'));

                return json_encode(['msg' => 'Product Added Successfully','status' => 200,'cartcount' => $cartcount]);

            }
          }else{

            $req->session()->put('cart_item',array($product_hsn => ['qty' => 1]));

            if($req->session()->has('login_status'))
            {
            $this->store_cart_data();
            }

        $cartcount = count(session('cart_item'));

        return json_encode(['msg' => 'Product Added Successfully','status' => 200,'cartcount' => $cartcount]);

          }
        }
        return json_encode(['msg' => 'Error.Try Again','status' => 500  ]);
    }
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
                    if($req->session()->has('login_status'))
                    {
                       $this->store_cart_data();
                    }
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
        if($req->session()->has('cart_item') && $req->session()->has('login_status')){
        
        $this->store_cart_data();

        $getproducts = $this->populate_cart();
        $customeraddress = $this->get_address();

        if($req->session()->has('coupon_code'))
        {
            $check = ManageCoupon::where('coupon_status','=','1')
            ->where('coupon_code','=',$req->session()->get('coupon_code.cname'))
            ->get();

            if($check -> isEmpty()){                
            }else{
                $data = [
                    'cname' => $check[0]->coupon_code,
                    'value' => $check[0]->coupon_value,
                     
                 ];
                $req->session()->put('coupon_code',$data);
            }
        }
        return view('front.cartpagecontent.cart',['title' => 'Cart'],compact('getproducts','customeraddress'));
        }else{
        
            return redirect()->route('homepage');
        }
    }

    public function populate_cart()
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
            $feedback = new FeedbackView();
            
            $feedback->customerfeedback_email = $req->email;
            $feedback->description = $req->review;
            $feedback->rating = $req->rating;
            $feedback->product_id = $req->pid;
             $feedback->customerid = $req->session()->get('userid');
             $feedback->save();        

            if($feedback){
                $appendfeedback = array($req->all());
                return json_encode(['msg' => $appendfeedback,'status'=>200]);
            }else{
                return json_encode(['status'=>500]);
            }
        }
        return false;
    }

    public function get_coupon(Request $req)
    {
        if($req->ajax() && $req->session()->has('login_status'))
       {
            $couponactivity  = strip_tags($req->input('couponid'));
            if(is_numeric($couponactivity)){
            switch ($couponactivity) {
                case '1':
                    
                    $coupon = strip_tags($req->input('couponcode'));
                    $checkcoupon = ManageCoupon::where('coupon_status','=','1')
                    ->where('coupon_code','=',$coupon)->get();
                    if($checkcoupon -> isEmpty()){
                        return response()->json(['msg' => 'Coupon Invalid','status'=> 500]);                
                    }else{
                        $sessiondata = [
                           'cname' => $coupon,
                           'value' => $checkcoupon[0]->coupon_value,
                            
                        ];
                        $req->session()->put('coupon_code',$sessiondata);
                        return response()->json(['msg' => 'Congrats! You got '.$checkcoupon[0]->coupon_value.' discount.',
                        'status' => 200]);
                    }
                    break;

                case '2' :

                    if($req->session()->has('coupon_code')){
                        $req->session()->forget('coupon_code');
                        return response()->json(['msg' => 'Remove Successfully' ,'status' => 200]);
                    }
                    break;

                default:    
                    return response()->json(['msg' => 'Error in getting coupon data','status' => 500]);
                    break;
            }
            }else{
                return response()->json(['msg' => 'invalid coupon format','status' => 500]);
            }
        }
    }
}

?>