<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFolderRequest;
use App\Http\Requests\UpdateFolderRequest;
use App\Models\File;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $file_id = Folder::all();
        $folders = Folder::where('file_id', null)->get();
        $files = File::where('file_id', null)->get();
//        $folders = Folder::all();
//        $files = File::all();
        return view('folder.index',compact(['folders','files']));
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
     * @param  \App\Http\Requests\StoreFolderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFolderRequest $request)
    {
//        return $request;

        $folder = new Folder();
        $folder->folderName	= $request->folderName;
        $folder->user_id = Auth::id();

        if ($request->file_id != null ){
            $folder->file_id = $request->file_id;
        }

//        return $request;

        $folder->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function show(Folder $folder)
    {
//        return $folder;
        $datas = Folder::where('file_id',$folder->id)->get();
        $files = File::where('file_id',$folder->id)->get();

        return view('folder.show',compact(['folder','datas','files']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function edit(Folder $folder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFolderRequest  $request
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFolderRequest $request, Folder $folder)
    {
//        return $request;
        $folder->folderName	= $request->folderName;
        $folder->user_id = Auth::id();

        if ($request->file_id != null ){
            $folder->file_id = $request->file_id;
        }

        $folder->update();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        return $id;
        $folder = Folder::where('user_id',Auth::id())->withTrashed()->findOrFail($id);

        //forceDelete
        if ($folder->trashed()){
            $folder->forceDelete();
        }

        //softDelete
        $folder->delete();
        return redirect()->back();
    }

    public function restore($id){
        $folder = Folder::onlyTrashed()->fineOrFail($id);

        $folder->restore();
        return redirect()->back();
    }

    public function trash(){
        $folders = Folder::onlyTrashed()->get();
        return view('folder.trash',compact('folders'));
    }
}
