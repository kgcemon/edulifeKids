<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <form action="{{route("navbar.store")}}" method="post">
                    @csrf
                    @method("post")
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Name *</label>
                                <input type="text" class="form-control" name="name">
                                <label class="form-label">Url *</label>
                                <input type="text" class="form-control" name="link">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button TYPE="submit" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
                </form>
            </div>
    </div>
</div>


