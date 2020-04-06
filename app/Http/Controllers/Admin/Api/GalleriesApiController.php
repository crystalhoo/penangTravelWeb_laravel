<?php

namespace App\Http\Controllers\Admin\Api;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Http\Resources\GalleryResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GalleriesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        // abort_if(Gate::denies('gallery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GalleryResource(Gallery::all());
    }

    public function store(StoreGalleryRequest $request)
    {
        $gallery = Gallery::create($request->all());

        if ($request->input('photos', false)) {
            $gallery->addMedia(storage_path('tmp/uploads/' . $request->input('photos')))->toMediaCollection('photos');
        }

        return (new GalleryResource($gallery))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Gallery $gallery)
    {
        // abort_if(Gate::denies('gallery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GalleryResource($gallery);
    }

    public function update(UpdateGalleryRequest $request, $id)
    {
        $gallery = Gallery::find($id);
        $gallery->update($request->all());

        if ($request->input('photos', false)) {
            if (!$gallery->photos || $request->input('photos') !== $gallery->photos->file_name) {
                $gallery->addMedia(storage_path('tmp/uploads/' . $request->input('photos')))->toMediaCollection('photos');
            }
        } elseif ($gallery->photos) {
            $gallery->photos->delete();
        }

        return (new GalleryResource($gallery))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

        // try {
        //     $gallery = Gallery::find($id);
        //     if(!$gallery) throw new ModelNotFoundException;
        //
        //     $gallery->fill($request->all());
        //
        //     $gallery->saveOrFail();
        //
        //     // return response()->json(null, 204);
        //     return redirect()->route('admin.galleries.index');
        // }
        // catch(ModelNotFoundException $ex) {
        //     return response()->json([
        //         'message' => $ex->getMessage(),
        //     ], 404);
        // }
        // catch(QueryException $ex) {
        //     return response()->json([
        //         'message' => $ex->getMessage(),
        //     ], 500);
        // }
        // catch(\Exception $ex) {
        //     return response()->json([
        //         'message' => $ex->getMessage(),
        //     ], 500);
        // }
    }

    public function destroy($id)
    {
        // abort_if(Gate::denies('gallery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $gallery->delete();
        //
        // return response(null, Response::HTTP_NO_CONTENT);

        try {
            $gallery = Gallery::find($id);
            if(!$gallery) throw new ModelNotFoundException;

            $gallery->delete();
            // $plan->saveOrFail();

            //return response()->json(null, 204);
            return redirect()->route('admin.galleries.index')
                        ->with('success','gallery deleted successfully');
        }
        catch(ModelNotFoundException $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
            ], 404);
        }
        catch(QueryException $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
            ], 500);
        }
        catch(\Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
            ], 500);
        }
    }
}
