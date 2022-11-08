@extends('layouts.app')
@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="dropdown me-3">
                    <a  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-grid fs-5 text-black"></i>
                    </a>

                    <div class="dropdown-menu border-0 shadow py-2 px-1">
                        <a class="list-group-item list-group-item-action border-0 my-2 mx-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$folder->id}}">
                            <i class="bi bi-folder fs-4 me-3 "></i>
                            <span class="h6 my-1">New Folder</span>
                        </a>

{{--                        <form action="{{route('file.store')}}"  method="post" enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            <input type="file" class="form-control" name="photos[]"  id="fileInput" multiple hidden>--}}
{{--                            <button class="list-group-item list-group-item-action border-0 my-2 mx-4" form="fileUpload" >--}}
{{--                                <i class="bi bi-file-earmark-plus fs-4 me-3 "></i>--}}
{{--                                <span class="h6 my-1">File Upload</span>--}}
{{--                            </button>--}}
{{--                        </form>--}}
                        <button class="list-group-item list-group-item-action border-0 rounded btn-rounded ps-5 " id="inputFileClick">
                            <i class="bi bi-file-earmark-plus fs-4 me-3 "></i>
                            <span class="h6 my-1">File Upload</span>
                        </button>

                        <a class="list-group-item list-group-item-action border-0 my-2 mx-4 " href="">
                            <i class="bi bi-folder fs-4 me-3 "></i>
                            <span class="h6 my-1">Folder Upload</span>
                        </a>
                    </div>
                </div>

{{--                {{\App\Models\Folder::where('file_id',$folder->id)->get()}}--}}

{{--                {{ $datas }}--}}

{{--                {{ $file_id = \App\Models\Folder::all('file_id')}}--}}
{{--                {{   $folders = \App\Models\Folder::whereIn('$file_id', ['null'])->get()}}--}}

                @foreach($datas as $folder)
                    <a class="card d-inline-block m-2 text-decoration-none text-black pointer" href="{{route('folder.show',$folder->id)}}" style="width: 13rem;">
                        <div class="card-body p-2 d-flex align-items-center">
                            <i class="bi bi-folder-fill text-black-50 fs-3 mx-3"></i>
                            <span class="fs-6 fw-bold">{{$folder->folderName}}</span>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>


    <form action="{{route('file.store')}}" id="submitForm" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" class="form-control" name="photos[]" id="fileInput" multiple hidden>
    </form>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop{{$folder->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Create New Folder</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('folder.store')}}">
                        @csrf
                        <input type="text" value="Untitled Folder" name="folderName" class="form-control">
                        <div class="my-2 d-flex justify-content-end">
                            <div class=""></div>
                            <div class="my-3">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop
