<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreclinicRequest;
use App\Http\Requests\UpdateclinicRequest;
use App\Models\clinic;

class ClinicController extends Controller
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
    public function store(StoreclinicRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(clinic $clinic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(clinic $clinic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateclinicRequest $request, clinic $clinic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(clinic $clinic)
    {
        //
    }
}
