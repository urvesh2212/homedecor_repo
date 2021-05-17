<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\BannerSlider;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BannerSliderController extends Controller
{
    use MediaUploadingTrait;

    private $title = 'Manage Banner';

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $query = BannerSlider::query()->select(sprintf('%s.*', (new BannerSlider)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'product_show';
                $editGate      = 'product_edit';
                $deleteGate    = 'product_delete';
                $crudRoutePart = 'manage-banner';

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
            $table->editColumn('bannerslider_img', function ($row) {
                if (!$row->bannerslider_img) {
                    return '';
                }

                $links = [];

                foreach ($row->bannerslider_img as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->editColumn('bannerslider_status', function ($row) {
                return $row->bannerslider_status ? BannerSlider::BANNER_STATUS_SELECT[$row->bannerslider_status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'bannerslider_img']);

            return $table->make(true);
        }

        return view('admin.bannerslider.index', ['title' => $this->title]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bannerslider.create',['title' => $this->title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bannerdata = BannerSlider::create($request->all());

        foreach ($request->input('bannerslider_img', []) as $file) {
            $bannerdata->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('bannerslider_img');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $bannerdata->id]);
        }

        return redirect()->route('admin.manage-banner.index'->with('success','Banner Successfully Created.'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(BannerSlider $manage_banner)
    {
     return view('admin.bannerslider.edit', ['title' => $this->title], compact('manage_banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param BannerSlider $BannerSlider
     * @return \Illuminate\Http\Response
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function update(Request $request,BannerSlider $manage_banner)
    {
        $manage_banner->update($request->all());

        if (count($manage_banner->bannerslider_img) > 0) {
            foreach ($manage_banner->bannerslider_img as $media) {
                if (!in_array($media->file_name, $request->input('bannerslider_img', []))) {
                    $media->delete();
                }
            }
        }

        $media = $manage_banner->bannerslider_img->pluck('file_name')->toArray();

        foreach ($request->input('bannerslider_img', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $manage_banner->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('bannerslider_img');
            }
        }

        return redirect()->route('admin.manage-banner.index')->with('success',"Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BannerSlider $manage_banner)
    {
        $manage_banner->delete();

        return back()->with('success',"Successfully Deleted");
    }

    public function massDestroy(Request $request)
    {
        BannerSlider::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {

        $model         = new BannerSlider();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
