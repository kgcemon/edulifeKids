<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Visitor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="Name" class="form-label">Batch Name *</label>
                                <input id="BatchName" type="text" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="Email" class="form-label">Batch Code *</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <input type="hidden" id="updateID">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="Update()" id="update-btn" class="btn btn-success">Update</button>
            </div>
        </div>
    </div>
</div>




