<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Front\NewAddressRequest;
use App\Models\Front\Customer;
use App\Models\Front\CustomerAddress;

class CustomerController extends Controller
{

    protected $title;

    public function __construct(){
         $this->title = 'My Account';
    }


    public function dashboard()
    {
        $curruser = session()->get('userid');
        $userdata = Customer::with('customeraddress','customerorder')
                            ->where('uid','=',$curruser)->get();

        return view('front.user_dashboard',['title' => $this->title],compact('userdata'));
    }

    public function  newaddress(NewAddressRequest $request)
    {
     $curruser = session()->get('userid');
     $customeraddress = new CustomerAddress();

     $customeraddress->customerid = $curruser;
     $customeraddress->flatno = $request->flatno;
     $customeraddress->landmark = $request->landmark;
     $customeraddress->state = $request->state;
     $customeraddress->city = $request->city;
     $customeraddress->zipcode = $request->zipcode;
     $customeraddress->save();

     if($customeraddress){
         $getcustomeraddress = CustomerAddress::where('customerid','=',$curruser)->get();
         return response()->json(['web'=> 200,'address' => $getcustomeraddress]);
     }else{
        return response()->json(['web'=> 500]);
     }

    }

    public function makedeaultaddress(Request $request)
    {
        if($request->ajax())
        {
            $address = CustomerAddress::findorfail($request->id);
            $address->default_address = 1;

        }
    }
}
