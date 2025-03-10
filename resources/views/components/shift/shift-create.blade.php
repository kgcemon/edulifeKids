<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Shift</h5>
            </div>
            <div class="modal-body">
                <form id="save-form" method="POST" action="{{ route('shifts.store') }}">
                    @csrf
                    @method("POST")
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Shift Name *</label>
                                <input type="text" class="form-control" name="name" required>
                                <label class="form-label">Description *</label>
                                <input type="text" class="form-control" name="description" required>
                                <label class="form-label">Active *</label>
                                <select name="active" class="form-control" required>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                        <button type="submit" class="btn bg-gradient-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
