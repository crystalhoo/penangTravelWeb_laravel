<?php

namespace App\Http\Controllers\Admin\Api;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Http\Resources\GalleryResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class GalleriesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {

        return new GalleryResource(Gallery::all());
    }

    public function store(StoreGalleryRequest $request)
    {
        $gallery = Gallery::create($request->all());

        if ($request->input('photos', false)) {
            $gallery->addMedia(storage_path('tmp/uploads/' . $request->input('photos')))->toMediaCollection('photos');
        }

        if  (Gate::allows('admin-only', auth()->user())) {
          return (new GalleryResource($gallery))
              ->response()
              ->setStatusCode(Response::HTTP_CREATED);
        }
        return 'You are not admin!!!!';


    }

    public function show(Gallery $gallery)
    {
       
        return new GalleryResource($gallery);
    }

    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
       
        $gallery->update($request->all());

        if ($request->input('photos', false)) {
            if (!$gallery->photos || $request->input('photos') !== $gallery->photos->file_name) {
                $gallery->addMedia(storage_path('tmp/uploads/' . $request->input('photos')))->toMediaCollection('photos');
            }
        } elseif ($gallery->photos) {
            $gallery->photos->delete();
        }

        if (Gate::allows('admin-only', auth()->user())) {
          return (new GalleryResource($gallery))
              ->response()
              ->setStatusCode(Response::HTTP_ACCEPTED);
        }
        return 'You are not admin!!!!';


    }

    public function destroy($id)
    {
       
        try {
            $gallery = Gallery::find($id);
            if(!$gallery) throw new ModelNotFoundException;


            if (Gate::allows('admin-only', auth()->user())) {
            $gallery->delete();
              return redirect()->route('admin.galleries.index')
                          ->with('success','gallery deleted successfully');
            }
            return 'You are not admin!!!!';

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
