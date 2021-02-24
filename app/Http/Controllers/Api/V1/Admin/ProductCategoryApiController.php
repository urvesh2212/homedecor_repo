<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Http\Resources\Admin\ProductCategoryResource;
use App\Models\ProductCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductCategoryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductCategoryResource(ProductCategory::all());
    }

    public function store(StoreProductCategoryRequest $request)
    {
        $productCategory = ProductCategory::create($request->all());

        if ($request->input('category_img', false)) {
            $productCategory->addMedia(storage_path('tmp/uploads/' . $request->input('category_img')))->toMediaCollection('category_img');
        }

        return (new ProductCategoryResource($productCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $productCategory->update($request->all());

        if ($request->input('category_img', false)) {
            if (!$productCategory->category_img || $request->input('category_img') !== $productCategory->category_img->file_name) {
                if ($productCategory->category_img) {
                    $productCategory->category_img->delete();
                }

                $productCategory->addMedia(storage_path('tmp/uploads/' . $request->input('category_img')))->toMediaCollection('category_img');
            }
        } elseif ($productCategory->category_img) {
            $productCategory->category_img->delete();
        }

        return (new ProductCategoryResource($productCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProductCategory $productCategory)
    {
        abort_if(Gate::denies('product_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
