<div class="modal fade zoomIn" id="create-modal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create Session</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('session.store') }}" method="post">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label for="sessionYear" class="form-label">Session Year *</label>
                                <select class="form-control" id="sessionYear" name="year" required>
                                    <option value="" disabled selected>Select Year</option>
                                    @for ($i = 2024; $i <= date('Y'); $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
