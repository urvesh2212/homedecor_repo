<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Front\Customer;

class CustomerController extends Controller
{
    public function CustomerRegister(Request $req)
    {

        if ($req->ajax()) {
            $validator =  Validator::make($req->all(), [
                'fname' => 'required',
                'lname' => 'required',
                'customer_number' => 'required|unique:customers',
                'customer_password' => 'required',
            ]);

            if ($validator->fails()) {
                             $customerdata =  Customer::where('customer_number',$req->customer_number)->first();
                               session(['loggedin_user' =>$customerdata->uid,'displaydata' => $customerdata->customer_name]);  
                return response()->json(array('msg' => 301));
            }

            $sessionid = random_bytes(15);
            $customerlogindata = new Customer();
            $customerlogindata->customer_name = $req->fname . '  ' . $req->lname;
            $customerlogindata->customer_number = $req->customer_number;
            $customerlogindata->customer_password = Hash::make($req->customer_password);
            $customerlogindata->uid = $sessionid;
            $customerlogindata->save();

            if ($customerlogindata) {
                session(['loggedin_user' => $sessionid, 'displaydata' => $req->fname]);
                return response()->json(array('msg' => $msg), 200);
            } else {
                return response()->json(array('msg' => 500));
            }
        }
        return false;
    }

    public function GoogleSignup(Request $req)
    {

        if ($req->ajax()) {

            $validator = Validator::make($req->all(), [
                'customer_email' => 'required|unique:customers',
                'uid' => 'required|unique:customers',
                'name' => 'required'
            ]);

            if ($validator->fails()) {
                $customerdata =  Customer::where('uid', $req->uid)->first();
                session(['loggedin_user' => $customerdata->uid, 'displaydata' => $customerdata->customer_name,'login_status' => true]);
                return response()->json(array('msg' => 200));
            }

            $customerGmaildata = new Customer();
            $customerGmaildata->uid = $req->uid;
            $customerGmaildata->customer_name = $req->name;
            $customerGmaildata->customer_email = $req->customer_email;
            $customerGmaildata->save();

            if ($customerGmaildata) {

                session(['loggedin_user' => $req->uid, 'displaydata' => $req->name,'login_status' => true]);
                return response()->json(array('msg' => 200));
            } else {
                return response()->json(array('msg' => 500));
            }
        }
        return response()->json(array('msg' => 500));
    }


    public function Logout(Request $req)
    {

        $req->session()->flush();
        return redirect()->route('homepage');
    }
}
