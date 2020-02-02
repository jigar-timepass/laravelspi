<?php

namespace App\Http\Controllers;

use App\Picture;
use App\Http\Resources\PictureCollection;
use App\Http\Resources\PictureResource;
 
class PictureAPIController extends Controller
{
    public function index()
    {
        return new PictureCollection(Picture::paginate());
    }
 
    public function show(Picture $picture)
    {
        return new PictureResource($picture->load(['customer']));
    }

    public function store(Request $request)
    {
        return new PictureResource(Picture::create($request->all()));
    }

    public function update(Request $request, Picture $picture)
    {
        $picture->update($request->all());

        return new PictureResource($picture);
    }

    public function destroy(Request $request, Picture $picture)
    {
        $picture->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}