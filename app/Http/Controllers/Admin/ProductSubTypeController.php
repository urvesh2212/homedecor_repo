<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductSubTypeRequest;
use App\Http\Requests\StoreProductSubTypeRequest;
use App\Http\Requests\UpdateProductSubTypeRequest;
use App\Models\Product;
use App\Models\ProductSubType;
use App\Models\ProductVariant;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductSubTypeController extends Controller
{
    
    private $title ='Manage ProductSubType';


    public function index(Request $request)
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ProductSubType::with(['productid', 'productvariantid'])->select(sprintf('%s.*', (new ProductSubType)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder','');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'product_show';
                $editGate      = 'product_edit';
                $deleteGate    = 'product_delete';
                $crudRoutePart = 'productsubtype';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            
            $table->editColumn('hsn_code', function ($row) {
                return $row->hsn_code ? $row->hsn_code : "";
            });
          
            $table->editColumn('product_name', function ($row) {
                return $row->productid->product_name ? $row->productid->product_name : "";
            });

            $table->editColumn('product_variant_name', function ($row) {
                return $row->productvariantid->product_variant_name ? $row->productvariantid->product_variant_name : "";
            });
            
            $table->editColumn('stock', function ($row) {
                return $row->stock ? $row->stock : "";
            });
            $table->editColumn('final_price', function ($row) {
                return $row->final_price ? $row->final_price : "";
            });
            $table->editColumn('offer_price', function ($row) {
                return $row->offer_price ? $row->offer_price : "";
            });
            $table->editColumn('product_subtype_status', function ($row) {
                return $row->product_subtype_status ? ProductSubType::PRODUCT_SUBTYPE_STATUS_SELECT[$row->product_subtype_status] : '';
            });

            return $table->make(true);
        }

        return view('admin.productsubtype.index',['title' => $this->title]);
    }

    public function create()
    {
        $productdata = Product::all()->pluck('product_name','id')->prepend(trans('global.pleaseSelect'), '');

        $productvariantdata = ProductVariant::all()->pluck('product_variant_name','id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.productsubtype.create',['title' => $this->title],compact('productdata','productvariantdata'));
    }

    public function store(StoreProductSubTypeRequest $request)
    {
        $product = ProductSubType::create($request->all());

        return redirect()->route('admin.productsubtype.index',['title' => $this->title]);
    }

    public function edit(ProductSubType $productsubtype)
    {

        $productdata = Product::all()->pluck('product_name','id')->prepend(trans('global.pleaseSelect'), '');

        $productvariantdata = ProductVariant::all()->pluck('product_variant_name','id')->prepend(trans('global.pleaseSelect'), '');

        $productsubtype->load('productid', 'productvariantid');

        return view('admin.productsubtype.edit', ['title' => $this->title],compact('productdata', 'productvariantdata', 'productsubtype'));
    }

    public function update(UpdateProductSubTypeRequest $request, ProductSubType $productsubtype)
    {   
     
       $productsubtype->update($request->all());

       return redirect()->route('admin.productsubtype.index');
    }

    public function destroy(ProductSubType $productsubtype)
    {

        $productsubtype->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductSubTypeRequest $request)
    {
        ProductSubType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
