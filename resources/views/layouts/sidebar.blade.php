<div class="sidebar">

    <div class="dropdown">
        <button class=" border-0 bg-light dropdown-toggle rounded my-3 mx-5 py-2 px-4 rounded-pill d-flex align-items-center  ps-3 shadow px-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-plus fs-1"></i>
            <span class="h5 fw-bold m-0 p-0 letter-spacing">Create</span>
        </button>
        <div class="dropdown-menu border-0 shadow rounded-3">
            <a class="list-group-item list-group-item-action border-0 rounded btn-rounded px-4 py-1  my-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="bi bi-folder fs-4 me-3 "></i>
                <span class="h6 my-1">New Folder</span>
            </a>

            <a class="list-group-item list-group-item-action border-0 rounded btn-rounded px-4 py-1 my-1 " id="inputFileClick">
                <i class="bi bi-file-earmark-plus fs-4 me-3 "></i>
                <span class="h6 my-1">File Upload</span>
            </a>

            <form action="{{route('file.store')}}" id="submitForm" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" class="form-control" name="photos[]" id="fileInput" multiple hidden>
            </form>


            <form action="{{route('file.store')}}" id="submitForm" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" class="folderName" name="folder_name"  hidden>
                <input type="file" class="form-control"   multiple hidden>
                <button class="list-group-item list-group-item-action border-0 rounded btn-rounded mx-2 my-1 " id="inputFilClick">
                    <i class="bi bi-folder fs-4 me-3 "></i>
                    <span class="h6 my-1">Folder Upload</span>
                </button>
            </form>
        </div>
    </div>



    <div class="list-group mb-3 underline">
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
                        <input type="text" placeholder="Untitled Folder" name="folderName" class="form-control" required>
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




