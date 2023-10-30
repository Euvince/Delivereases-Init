<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategoryFormRequest;

class SubCategoryController extends Controller
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
    public function store(SubCategoryFormRequest $request)
    {
        SubCategory::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryFormRequest $request, SubCategory $subCategory)
    {
        $subCategory->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
    }
}
