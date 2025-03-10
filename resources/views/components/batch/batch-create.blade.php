<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Visitor</h5>
                </div>
                <div class="modal-body">
                    <form action="{{route("batch.store")}}" method="post">
                        @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Batch Name *</label>
                                <input type="text" class="form-control" name="BatchName">
                                <label class="form-label">Batch code *</label>
                                <input type="text" class="form-control" name="BatchCode">
                            </div>
                        </div>
                    </div>

                        <div class="modal-footer">
                            <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                            <button type="submit" id="save-btn" class="btn bg-gradient-success" >Save</button>
                        </div>

                    </form>
                </div>
            </div>
    </div>
</div>

