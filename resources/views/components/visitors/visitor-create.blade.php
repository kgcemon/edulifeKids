<div class="modal fade zoomIn" id="create-modal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create Visitor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('create-visitors') }}" method="POST">
                    @csrf
                    <div class="container">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="name" class="form-label">Name *</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="col-12">
                                <label for="mobile" class="form-label">Mobile *</label>
                                <input type="tel" class="form-control" id="mobile" name="mobile" required>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Address *</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="col-12">
                                <label for="kidsName" class="form-label">Child Name *</label>
                                <input type="text" class="form-control" id="kidsName" name="KidsName" required>
                            </div>
                            <div class="col-12">
                                <label for="kidsAge" class="form-label">Child Age *</label>
                                <input type="number" class="form-control" id="kidsAge" name="KidsAge" required>
                            </div>
                            <div class="col-12">
                                <label for="class" class="form-label">Class *</label>
                                <select id="class" name="class" class="form-select" required>
                                    <option value="" disabled selected>Select Class</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="interested" class="form-label">Interested in *</label>
                                <select id="interested" name="interested" class="form-select" required>
                                    <option value="" disabled selected>Select Option</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    <option value="n/a">N/A</option>
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
