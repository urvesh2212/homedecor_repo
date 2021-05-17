<?php 

namespace App\Traits;

use App\Models\Front\Customer;
use Illuminate\Database\Eloquent\Model;
use DB;

trait StoreCartDetails
{
    public function store_cart_data()
    {
        if(session()->has('cart_item')){
            $cartdata = session()->get('cart_item');
            $insertcartdata = DB::table('customers')->where('uid','=',session()->get('userid'))
            ->update([
                'cart_items' => $cartdata
            ]);
    
            if($insertcartdata){
                return true;
            }else{
                return false;
            }
        }
    }

}
?>