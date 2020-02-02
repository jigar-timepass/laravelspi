<?php

namespace App\Http\Controllers;

use App\Email;
use App\Http\Resources\EmailCollection;
use App\Http\Resources\EmailResource;
 
class EmailAPIController extends Controller
{
    public function index()
    {
        return new EmailCollection(Email::paginate());
    }
 
    public function show(Email $email)
    {
        return new EmailResource($email->load(['customer']));
    }

    public function store(Request $request)
    {
        return new EmailResource(Email::create($request->all()));
    }

    public function update(Request $request, Email $email)
    {
        $email->update($request->all());

        return new EmailResource($email);
    }

    public function destroy(Request $request, Email $email)
    {
        $email->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}