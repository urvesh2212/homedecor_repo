<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Front\Customer;


class ManageCustomerController extends Controller
{
    private $title = 'Manage Customers';
    public function index()
    {
        $customerdata = Customer::all();
        return view('admin.manageCustomers.index',['title' => $this->title],compact('customerdata'));
    }

    public function massDestroy(Request $req)
    {
        Customer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function show($customer)
    {
        $customerdata = Customer::findorfail($customer);

        return view('admin.manageCustomers.show',['title' => $this->title,'customerdata' => $customerdata]);

    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return back();
    }
}
