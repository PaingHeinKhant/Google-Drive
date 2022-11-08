<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();

        return view('folder.index',compact('files'));
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
     * @param  \App\Http\Requests\StoreFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileRequest $request)
    {
//        dd($request->photos[0]->getClientOriginalName());

        dd($request->photos);


        if($request->hasFile('filename')) {
            $file = new File();
            $file->name = $request->filename;
            $file->save();

            foreach ($request->filename as $key=>$file){
                // 1.save to storage
                $newName = uniqid()."_file.".$file->extension();
                $file->storeAs("public",$newName);

                $savedFile[$key] = [
                    "extension" => $file->extension(),
                    "name" => $newName,
                    "folder_id" => $request->folder_id,
                    "user_id" =>Auth::id(),
                    "originalName" => $request->file->getClientOriginalName(),
                ];
            }
            File::insert($savedFile);
        }
        if ($request->hasFile('photos')){
            foreach ($request->photos as $key=>$photo){
                // 1.save to storage
                $newName = uniqid()."_post_photo.".$photo->extension();
                $photo->storeAs("public",$newName);
//            Storage::putFileAs("/",$photo,$newName,'public');
                $savedPhotos[$key] = [
                    "extension" => $photo->extension(),
                    "folder_id" => $request->folder_id,
                    "user_id" =>Auth::id(),
                    "name" => $newName,
                    "originalName" => $photo,
                ];
            }
            File::insert($savedPhotos);
        }
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFileRequest  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
