<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Campus</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Campus Name *</label>
                                <input type="text" class="form-control" id="CampusName">
                                <label class="form-label">Campus Code *</label>
                                <input type="text" class="form-control" id="CampusCode">
                                <label class="form-label">Campus Address *</label>
                                <input type="text" class="form-control" id="CampusAddress">
                                <label class="form-label">Mobile *</label>
                                <input type="number" class="form-control" id="mobile">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email">

                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>
    async function Save() {
        // Collect form values
        let CampusName = document.getElementById('CampusName').value.trim();
        let CampusCode = document.getElementById('CampusCode').value.trim();
        let CampusAddress = document.getElementById('CampusAddress').value.trim();
        let mobile = document.getElementById('mobile').value.trim();
        let email = document.getElementById('email').value.trim();

        // Input validation
        if (CampusName.length === 0) {
            errorToast("Campus Name is required!");
        } else if (CampusCode.length === 0) {
            errorToast("Campus Code is required!");
        }
        else {
            // Close modal and show loader
            document.getElementById('modal-close').click();
            showLoader();

            try {
                // Send POST request
                let res = await axios.post("/campus-create", {
                    CampusName: CampusName,
                    CampusCode: CampusCode,
                    CampusAddress: CampusAddress,
                    mobile: mobile,
                    email: email
                });

                hideLoader();

                if (res.status === 201) {
                    successToast('Customer created successfully!');
                    document.getElementById("save-form").reset();
                    await getList();
                } else {
                    errorToast("Request failed!");
                }
            } catch (error) {
                hideLoader();
                // Handle specific server errors if available
                errorToast(error.response?.data?.message || "An unexpected error occurred!");
            }
        }
    }
</script>

