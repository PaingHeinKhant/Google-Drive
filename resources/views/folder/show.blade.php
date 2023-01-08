@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
{{--            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">--}}
{{--                <ol class="breadcrumb">--}}
{{--                    <li class="breadcrumb-item"><a href="{{ route('folder.index') }}">Home</a></li>--}}
{{--                    <li class="breadcrumb-item active" aria-current="page">{{$folder->folderName}}</li>--}}
{{--                </ol>--}}
{{--            </nav>--}}
            <div class="col">
                <div class="dropdown me-3 my-3">
                    <a  href="#" class="text-decoration-none " role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <h5 class="text-decoration-none text-black fw-bolder">CREATE YOUR FOLDER AND FILES
                            <i class="bi bi-grid fs-5 text-black"></i>
                        </h5>

                    </a>

                    <div class="dropdown-menu border-0 shadow py-2 px-1">
                        <a class="list-group-item list-group-item-action border-0 my-2 mx-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$folder->id}}">
                            <i class="bi bi-folder fs-4 me-3 "></i>
                            <span class="h6 my-1">New Folder</span>
                        </a>

                        <form  action="{{route('file.store')}}" method="post" id="fileUpload" enctype="multipart/form-data">
                            @csrf
                            <input type="number" name="folder_id" form="fileUpload"  value="{{$folder->id}}" hidden>
                                <div class="d-flex">
                                    <input form="fileUpload" type="file" name="photos[]" multiple class="file-upload-input form-control w-25">
                                    <button form="fileUpload"   class="btn btn-light file-upload-btn " >
                                        <i class="bi bi-file-earmark-plus fs-4 me-3 "></i>
                                        <span class="h6 my-1">File Upload</span>
                                    </button>
                                </div>

                        </form>

{{--                        <button class="list-group-item list-group-item-action border-0 rounded btn-rounded ps-5 " id="inputFileClick">--}}
{{--                            <i class="bi bi-file-earmark-plus fs-4 me-3 "></i>--}}
{{--                            <span class="h6 my-1">File Upload</span>--}}
{{--                        </button>--}}

                        <a class="list-group-item list-group-item-action border-0 my-2 mx-4 " href="">
                            <i class="bi bi-folder fs-4 me-3 "></i>
                            <span class="h6 my-1">Folder Upload</span>
                        </a>
                    </div>
                </div>

                <div class="col-12">
                    <h6 class="text-black-50 fw-bolder my-4">Folders</h6>

                    @foreach($datas as $folder)
                       <div class="relative d-inline-block">
                           <a class="card d-inline-block m-2 text-decoration-none text-black pointer" href="{{route('folder.show',$folder->id)}}" style="width: 13rem;">
                               <div class="card-body p-2 d-flex align-items-center">
                                   <i class="bi bi-folder-fill text-black-50 fs-3 mx-3"></i>
                                   <span class="fs-6 fw-bold">{{$folder->folderName}}</span>
                               </div>
                           </a>
                           <div class="dropdown position" >
                               <a  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                   <i class="bi bi-three-dots-vertical fs-5 text-black"></i>
                               </a>

                               {{--                          {{$folder}}--}}

                               <div class="dropdown-menu border-0 shadow py-2 px-1">

                                   <!-- Button trigger modal -->
                                   <button type="button" class=" my-2 list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3" data-bs-target="#renameFolder{{$folder->id}}" data-bs-toggle="modal" >
                                       <i class="bi bi-pencil-fill fs-6 me-1"></i>
                                       <span class="my-1" >Rename</span>
                                   </button>

                                   <form class="d-block" method="POST" action="{{route('folder.destroy',$folder->id)}}">
                                       @csrf
                                       @method('delete')
                                       <button type="submit" title="Delete"  class="  my-2 list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3">
                                           <i class="bi bi-trash fs-6 me-1"></i>
                                           <span class="my-1" >Delete</span>
                                       </button>
                                   </form>
                               </div>
                           </div>
                       </div>
                    @endforeach
                </div>
                <div class="col-12">
                    <h6 class="text-black-50 fw-bolder my-4">Files</h6>
                    {{--                {{$files}}--}}


                    @foreach($files as $file)

                        {{--                    {{$file->extension}}--}}

                        @if($file->extension === 'jpg' || $file->extension === 'jpeg'|| $file->extension === 'png' )
                            <div class="relative d-inline-block">
                                <a class="card d-inline-block m-2 text-decoration-none text-black pointer" style="width: 13rem;">
                                    <img src="{{ asset("storage/".$file->name) }}" class="card-img-top" width="130px" height="130px" style="object-fit: cover" >
                                    <div class="card-body" >
                                        <i class="bi bi-image-fill text-danger fs-4 mx-2"></i>
                                        <span class="small fw-bold text-black-50">{{$file->originalName}}</span>
                                    </div>
                                </a>
                                <div class="dropdown position-file" >
                                    <a  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical fs-5 text-black"></i>
                                    </a>

                                    {{--                          {{$folder}}--}}

                                    <div class="dropdown-menu border-0 shadow py-2 px-1">

                                        <!-- Button trigger modal -->
                                        <button type="button" class=" my-2 list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3" data-bs-target="#renameFile{{$file->id}}" data-bs-toggle="modal" >
                                            <i class="bi bi-pencil-fill fs-6 me-1"></i>
                                            <span class="my-1" >Rename</span>
                                        </button>

                                        <form class="d-block" method="POST" action="{{route('file.destroy',$file->id)}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" title="Delete"  class="  my-2 list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3">
                                                <i class="bi bi-trash fs-6 me-1"></i>
                                                <span class="my-1" >Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @elseif($file->extension === 'doc')
                            <div class="relative d-inline-block">
                                <a class="card d-inline-block m-2 text-decoration-none text-black pointer" style="width: 13rem;">
                                    <img src="{{ asset("storage/pngegg.png") }}" class="card-img-top" width="130px" height="130px" style="object-fit: contain" >
                                    <div class="card-body" >
                                        <i class="bi bi-file-earmark-bar-graph-fill text-danger fs-4 mx-2"></i>
                                        <span class="small fw-bold text-black-50">{{$file->originalName}}</span>
                                    </div>
                                </a>
                                <div class="dropdown position-file" >
                                    <a  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical fs-5 text-black"></i>
                                    </a>

                                    {{--                          {{$folder}}--}}

                                    <div class="dropdown-menu border-0 shadow py-2 px-1">

                                        <!-- Button trigger modal -->
                                        <button type="button" class=" my-2 list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3" data-bs-target="#renameFile{{$file->id}}" data-bs-toggle="modal" >
                                            <i class="bi bi-pencil-fill fs-6 me-1"></i>
                                            <span class="my-1" >Rename</span>
                                        </button>

                                        <form class="d-block" method="POST" action="{{route('file.destroy',$file->id)}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" title="Delete"  class="  my-2 list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3">
                                                <i class="bi bi-trash fs-6 me-1"></i>
                                                <span class="my-1" >Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @elseif($file->extension === 'pdf')
                            <div class="relative d-inline-block">
                                <a class="card d-inline-block m-2 text-decoration-none text-black pointer" style="width: 13rem;">
                                    <img src="{{ asset("storage/pngegg (2).png") }}" class="card-img-top" width="130px" height="130px" style="object-fit: contain" >
                                    <div class="card-body" >
                                        <i class="bi bi-file-earmark-bar-graph-fill text-danger fs-4 mx-2"></i>
                                        <span class="small fw-bold text-black-50">{{$file->originalName}}</span>
                                    </div>
                                </a>
                                <div class="dropdown position-file" >
                                    <a  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical fs-5 text-black"></i>
                                    </a>

                                    {{--                          {{$file}}--}}

                                    <div class="dropdown-menu border-0 shadow py-2 px-1">

                                        <!-- Button trigger modal -->
                                        <button type="button" class=" my-2 list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3" data-bs-target="#renameFile{{$file->id}}" data-bs-toggle="modal" >
                                            <i class="bi bi-pencil-fill fs-6 me-1"></i>
                                            <span class="my-1" >Rename</span>
                                        </button>

                                        <form class="d-block" method="POST" action="{{route('file.destroy',$file->id)}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" title="Delete"  class="  my-2 list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3">
                                                <i class="bi bi-trash fs-6 me-1"></i>
                                                <span class="my-1" >Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @elseif($file->extension === 'xlsx' || $file->extension === 'xlsm'|| $file->extension === 'xlsb')
                            <div class="relative d-inline-block">
                                <a class="card d-inline-block m-2 text-decoration-none text-black pointer" style="width: 13rem;">
                                    <img src="{{ asset("storage/pngegg (1).png") }}" class="card-img-top" width="130px" height="130px" style="object-fit: contain" >
                                    <div class="card-body" >
                                        <i class="bi bi-file-earmark-bar-graph-fill text-danger fs-4 mx-2"></i>
                                        <span class="small fw-bold text-black-50">{{$file->originalName}}</span>
                                    </div>
                                </a>
                                <div class="dropdown position-file" >
                                    <a  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical fs-5 text-black"></i>
                                    </a>

                                    {{--                          {{$folder}}--}}

                                    <div class="dropdown-menu border-0 shadow py-2 px-1">

                                        <!-- Button trigger modal -->
                                        <button type="button" class=" my-2 list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3" data-bs-target="#renameFile{{$file->id}}" data-bs-toggle="modal" >
                                            <i class="bi bi-pencil-fill fs-6 me-1"></i>
                                            <span class="my-1" >Rename</span>
                                        </button>

                                        <form class="d-block" method="POST" action="{{route('file.destroy',$file->id)}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" title="Delete"  class="  my-2 list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3">
                                                <i class="bi bi-trash fs-6 me-1"></i>
                                                <span class="my-1" >Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>

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
                    <form method="post" action="{{route('folder.store')}}" id="formInput{{$folder->id}}">
                        @csrf
                        <input type="text" value="Untitled Folder" name="folderName" class="form-control">
                        <input type="number" value="{{$folder->id}}" form="formInput{{$folder->id}}" hidden name="file_id">
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

    <!-- Modal -->
    @foreach($datas as $folder)
        <div class="modal fade" id="renameFolder{{$folder->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rename</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('folder.update',$folder->id)}}" id="updateForm{{$folder->id}}" >
                            @csrf
                            @method('put')
                            <input type="text" value={{ old('folderName',$folder->folderName) }} name="folderName" form="updateForm{{$folder->id}}"  class="form-control">
                            <input type="number" value="{{$folder->id}}" form="formInput{{$folder->id}}" hidden name="file_id">
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
    @endforeach


@stop
