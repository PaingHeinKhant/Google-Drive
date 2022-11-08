@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h6 class="text-black-50 fw-bolder my-4">Folders</h6>

                @foreach($folders as $folder)
                <a class="card d-inline-block m-2 text-decoration-none text-black pointer" href="{{route('folder.show',$folder->id)}}" style="width: 13rem;">
                    <div class="card-body p-2 d-flex align-items-center">
                        <i class="bi bi-folder-fill text-black-50 fs-3 mx-3"></i>
                        <span class="fs-6 fw-bold">{{$folder->folderName}}</span>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="col-12">
                <h6 class="text-black-50 fw-bolder my-4">Files</h6>
{{--                {{$files}}--}}


                @foreach($files as $file)

{{--                    {{$file->extension}}--}}

                    @if($file->extension === 'jpg' || $file->extension === 'jpeg'|| $file->extension === 'png' )
                        <a class="card d-inline-block m-2 text-decoration-none text-black pointer" style="width: 13rem;">
                            <img src="{{ asset("storage/".$file->name) }}" class="card-img-top" width="130px" height="130px" style="object-fit: cover" >
                            <div class="card-body" >
                                <i class="bi bi-image-fill text-danger fs-4 mx-2"></i>
                                <span class="small fw-bold text-black-50">{{$file->originalName}}</span>
                            </div>
                        </a>
                    @else
                        <a class="card d-inline-block m-2 text-decoration-none text-black pointer" style="width: 13rem;">
                            <img src="{{ asset("storage/Microsoft_Office_Excel_(2019–present).svg") }}" class="card-img-top" width="130px" height="130px" style="object-fit: fill" >
                            <div class="card-body" >
                                <i class="bi bi-file-earmark-bar-graph-fill text-danger fs-4 mx-2"></i>
                                <span class="small fw-bold text-black-50">{{$file->originalName}}</span>
                            </div>
                        </a>

                    @endif
                @endforeach
            </div>

            </div>
        </div>
    </div>
    @stop
