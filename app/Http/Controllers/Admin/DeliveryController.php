<?php

namespace App\Http\Controllers\Admin;

use App\Models\Delivery;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeliveryFormRequest;

class DeliveryController extends Controller
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
    public function store(DeliveryFormRequest $request)
    {
        Delivery::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $livraison)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeliveryFormRequest $request, Delivery $delivery)
    {
        $delivery->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
    }
}
