<?php

namespace App\Http\Controllers\Auth\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Front\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Traits\StoreCartDetails;

class CustomerLoginController extends Controller
{ 
    use StoreCartDetails;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    protected function getdata($req,$check)
    {
        if($check === 1){

            return Customer::where('uid','=',$req->uid)
                ->where('customer_email','=',$req->customer_email)->first();
        }else{
            return Customer::where('customer_number','=',$req->customer_number)->first();
        }

    }
    public  function  Googlelogin(Request $req): \Illuminate\Http\JsonResponse
    {
        if($req->ajax()) {
            $req->validate([
                'customer_email' => 'required',
                'uid' => 'required',
                'name' => 'required',
            ]);

            $customerdata = $this->getdata($req,1);

            if($customerdata)
            {   
                session(['userid' => $customerdata->uid, 'displaydata' => $customerdata->customer_name,'login_status' => true]);
                $this->store_cart_data();
                return response()->json(['msg' => 200]);
            }else
            {
                $req->validate([
                    'customer_email' => 'required|unique:customers',
                    'uid' => 'required|unique:customers',
                    'name' => 'required',
                ],[
                    'customer_number.unique' => ['msg' => 500],
                ]);

                $customerGmaildata = new Customer();
                $customerGmaildata->uid = $req->uid;
                $customerGmaildata->customer_name = $req->name;
                $customerGmaildata->customer_email = $req->customer_email;
                $customerGmaildata->save();
            }
            if($customerGmaildata)
            {
                session(['userid' => $req->uid, 'displaydata' => $req->name,'login_status' => true]);
                $this->store_cart_data();
                return response()->json(['msg' => 200]);
            }else{
                return response()->json(['msg' => 500]);
            }
        }
        return response()->json(['msg' => 500]);
    }

    public function Phonelogin(Request $request){

        if($request->ajax())
        {
            $request->validate([
                'customer_number' => 'required',
                'customer_password' => 'required',
            ]);

            $customerdata = $this->getdata($request,2);
            if($customerdata)
            {
                if(Hash::check($request->customer_password,$customerdata->customer_password))
                {
                    session(['userid' =>$customerdata->uid,'displaydata' => $customerdata->customer_number,'login_status' => true]);
                    $this->store_cart_data();
                    return response()->json(['msg' => 200]);
                }else{
                    return response()->json(['msg' => 201]);
                }
            }else{
                return response()->json(['msg' => 500]);
            }
        }
    }

    public function PhoneRegister(Request $request)
    {
    if($request->ajax())
    {

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'customer_number' => 'required|unique:customers',
            'customer_password' => 'required',
        ]);

        $sessionid = Str::random(28);
        $customerlogindata = new Customer();
        $customerlogindata->customer_name = $request->fname . '  ' . $request->lname;
        $customerlogindata->customer_number = $request->customer_number;
        $customerlogindata->customer_password = Hash::make($request->customer_password);
        $customerlogindata->uid = $sessionid;
        $customerlogindata->save();

        if($customerlogindata)
        {
            session(['userid' =>$sessionid,'displaydata' => $request->customer_number,'login_status' => true]);
            $this->store_cart_data();
            return response()->json(['msg' => 200]);
        }else{
            return response()->json(['msg' => 500]);
        }
    }
        return response()->json(['msg' => 500]);
    }

    public  function VerifyNumber(Request $request): \Illuminate\Http\JsonResponse
    {

       $registered_number =  $this->getdata($request,2);
       if(!empty($registered_number)){
           return response()->json(['msg' => 500]);
       }else{
           return response()->json(['msg' => 200]);
       }
    }
    public function Logout(Request $req)
    {
        $req->session()->flush();
        return redirect()->route('homepage');
    }

}
