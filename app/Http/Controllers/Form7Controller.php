<?php

namespace App\Http\Controllers;

use App\Models\Form7;
use App\Http\Requests\StoreForm7Request;
use App\Http\Requests\UpdateForm7Request;
use App\Models\Unit;

class Form7Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form7.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::all();
        return view('form7.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreForm7Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForm7Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form7  $form7
     * @return \Illuminate\Http\Response
     */
    public function show(Form7 $form7)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form7  $form7
     * @return \Illuminate\Http\Response
     */
    public function edit(Form7 $form7)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateForm7Request  $request
     * @param  \App\Models\Form7  $form7
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForm7Request $request, Form7 $form7)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form7  $form7
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form7 $form7)
    {
        //
    }
}
