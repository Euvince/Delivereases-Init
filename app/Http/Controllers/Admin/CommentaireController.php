<?php

namespace App\Http\Controllers\Admin;

use App\Models\Commentaire;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CommentaireFormRequest;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentaireFormRequest $request)
    {
        Commentaire::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Commentaire $commentaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentaireFormRequest $request, Commentaire $commentaire)
    {
        $commentaire->update($request->validate());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
    }
}
