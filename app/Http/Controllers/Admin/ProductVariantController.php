<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductVariantRequest;
use App\Http\Requests\StoreProductVariantRequest;
use App\Http\Requests\UpdateProductVariantRequest;
use App\Models\ProductVariant;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductVariantController extends Controller
{
    use MediaUploadingTrait;
    private $title ='Manage ProductVariant';

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $query = ProductVariant::select(sprintf('%s.*', (new ProductVariant)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'product_show';
                $editGate      = 'product_edit';
                $deleteGate    = 'product_delete';
                $crudRoutePart = 'productvariant';

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
            $table->editColumn('product_variant_name', function ($row) {
                return $row->product_variant_name ? $row->product_variant_name : "";
            });
            $table->editColumn('product_variant_status', function ($row) {
                return $row->product_variant_status ? ProductVariant::PRODUCT_VARIANT_STATUS_SELECT[$row->product_variant_status] : '';
            });

            return $table->make(true);
        }

        return view('admin.productvariant.index',['title' => $this->title]);
    }

    public function create()
    {
        return view('admin.productvariant.create',['title' => $this->title]);
    }

    public function store(StoreProductvariantRequest $request)
    {
        $productvariant = ProductVariant::create($request->all());

        return redirect()->route('admin.productvariant.index')->with('success','Product Variant Successfully Created.');
    }

    public function edit(ProductVariant $productvariant)
    {
        return view('admin.productvariant.edit', ['title' => $this->title],compact('productvariant'));
    }

    public function update(UpdateProductvariantRequest $request, ProductVariant $productvariant)
    {
        $productvariant->update($request->all());

        return redirect()->route('admin.productvariant.index')->with('success',"Successfully Updated");
    }

    public function destroy(ProductVariant $productvariant)
    {
        $productvariant->delete();

        return back()->with('success',"Successfully Deleted");
    }

    public function massDestroy(MassDestroyProductVariantRequest $request)
    {
        ProductVariant::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
