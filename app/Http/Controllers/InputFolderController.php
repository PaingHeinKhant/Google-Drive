<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInputFolderRequest;
use App\Http\Requests\UpdateInputFolderRequest;
use App\Models\InputFolder;

class InputFolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInputFolderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInputFolderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InputFolder  $inputFolder
     * @return \Illuminate\Http\Response
     */
    public function show(InputFolder $inputFolder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InputFolder  $inputFolder
     * @return \Illuminate\Http\Response
     */
    public function edit(InputFolder $inputFolder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInputFolderRequest  $request
     * @param  \App\Models\InputFolder  $inputFolder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInputFolderRequest $request, InputFolder $inputFolder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InputFolder  $inputFolder
     * @return \Illuminate\Http\Response
     */
    public function destroy(InputFolder $inputFolder)
    {
        //
    }
}
