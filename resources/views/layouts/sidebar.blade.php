<div class="sidebar">

{{--    <div class="dropdown">--}}
{{--        <div class=" rounded my-3 mx-4 py-2 px-4 rounded-pill ">--}}
{{--            <a class="list-group-item list-group-item-action d-flex align-items-center ps-3 shadow px-2" href="#">--}}
{{--                <i class="bi bi-plus fs-1"></i>--}}
{{--                <span class="h5 fw-bold m-0 p-0 letter-spacing">Create</span>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="dropdown-menu border-0 shadow py-2 px-1">--}}
{{--            <a class="list-group-item list-group-item-action border-0 rounded py-1 px-2  show ps-3 mb-3" href="">--}}
{{--                <i class="bi bi-printer fs-6 me-1"></i>--}}
{{--                <span class="my-1">Print</span>--}}
{{--            </a>--}}

{{--            <a class="list-group-item list-group-item-action border-0 rounded py-1 px-2 show ps-3 mb-3" href="">--}}
{{--                <i class="bi bi-archive fs-6 me-1"></i>--}}
{{--                <span class=" my-1">Hide From Contact</span>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}



    <div class="list-group mb-3 underline">
        <a class="list-group-item list-group-item-action border-0 rounded btn-rounded ps-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bi bi-folder fs-4 me-3 "></i>
            <span class="h6 my-1">New Folder</span>
        </a>

        <a class="list-group-item list-group-item-action border-0 rounded btn-rounded ps-5 " id="inputFileClick">
            <i class="bi bi-file-earmark-plus fs-4 me-3 "></i>
            <span class="h6 my-1">File Upload</span>
        </a>

        <a class="list-group-item list-group-item-action border-0 rounded btn-rounded ps-5 " id="folder">
            <i class="bi bi-folder fs-4 me-3 "></i>
            <span class="h6 my-1">Folder Upload</span>
        </a>
        <a class="list-group-item list-group-item-action border-0 rounded btn-rounded ps-5 " href="{{route('folder.index')}}">
            <i class="bi bi-hdd fs-4 me-3 "></i>
            <span class="h6 my-1">My drive</span>
        </a>

        <a class="list-group-item list-group-item-action border-0 rounded btn-rounded ps-5 " href="">
            <i class="bi-hdd-network fs-4 me-3"></i>
            <span class="h6 my-1">shared Drives</span>
        </a>
    </div>


    <div class="list-group mb-3 underline">
        <a class="list-group-item list-group-item-action border-0 rounded btn-rounded ps-5 " href="">
            <i class="bi bi-hdd fs-4 me-3"></i>
            <span class="h6 my-1">Computers</span>
        </a>
        <a class="list-group-item list-group-item-action border-0 rounded btn-rounded ps-5 " href="">
            <i class="bi bi-person-hearts fs-4 me-3"></i>
            <span class="h6 my-1">Share With Me</span>
        </a>
        <a class="list-group-item list-group-item-action border-0 rounded btn-rounded ps-5" href="">
            <i class="bi bi-clock fs-4 me-3"></i>
            <span class="h6 my-1">Recent</span>
        </a>
        <a class="list-group-item list-group-item-action border-0 rounded btn-rounded ps-5" href="">
            <i class="bi bi-star fs-4 me-3"></i>
            <span class="h6 my-1">Starred</span>
        </a>
        <a class="list-group-item list-group-item-action border-0 rounded btn-rounded ps-5" href="">
            <i class="bi bi-trash fs-4 me-3"></i>
            <span class="h6 my-1">Trash</span>
        </a>
    </div>

    <div class="list-group mb-3 underline">
        <a class="list-group-item list-group-item-action border-0 rounded btn-rounded ps-5 mb-3" href="">
            <i class="bi bi-cloud fs-4 me-3"></i>
            <span class="h6 my-1">Storage</span>
        </a>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

<form action="{{route('file.store')}}" id="submitForm" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" class="form-control" name="photos[]" id="fileInput" multiple hidden>
</form>

