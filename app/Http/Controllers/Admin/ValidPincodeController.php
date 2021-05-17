<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyValidPinCodeRequest;
use App\Http\Requests\StoreValidPinCodeRequest;
use App\Http\Requests\UpdateValidPinCodeRequest;
use App\Models\ValidPincode;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidPincodeController extends Controller
{

    private $title = 'Valid PinCodes';

    public function index()
    {
        $validpincodes = ValidPincode::all();

        return view('admin.validpincodes.index',['title' => $this->title], compact('validpincodes'));
    }


    public function create()
    {
        return view('admin.validpincodes.create',['title' => $this->title]);
    }


    public function store(StoreValidPinCodeRequest $request)
    {
        $validpincodes = ValidPincode::create($request->all());

        return redirect()->route('admin.validpincodes.index')->with('success',"PinCode Successfully Created");
    }


    public function edit($pincode)
    {   
        $validpincodes = ValidPincode::findorfail($pincode);
        
       return view('admin.validpincodes.edit',['title' =>  $this->title], compact('validpincodes'));
    }

    public function update(UpdatevalidPincodeRequest $request,$id)
    {   
        $validpincodes = ValidPincode::findorfail($id)->
        update($request->all());

        return redirect()->route('admin.validpincodes.index')->with('success',"Successfully Updated");
    }

    // public function destroy(ValidPincode $validpincodes)
    // {
    //     dd($validpincodes);
    //     // $validpincodes->delete();

    //     // return back();
    // }

        public function destroy($validpincodes)
    {
        $validpincodes = ValidPincode::findOrFail($validpincodes);
        $validpincodes->delete();

        return back();
    }
    

    public function massDestroy(MassDestroyValidPinCodeRequest $request)
    {

        ValidPincode::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

        // $validpincodes = $request->validpincodes;
        // DB::table("validpincode")->whereIn('validpincodes',explode(",",$validpincodes))->delete();
        // return response()->json(['success'=>"Products Deleted successfully."]);
    }

   
}
