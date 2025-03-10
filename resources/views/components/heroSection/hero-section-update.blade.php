<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Campus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="Name" class="form-label">Campus Name *</label>
                                <input type="text" class="form-control" id="myCampusName" required>
                            </div>
                            <div class="col-md-12">
                                <label for="Email" class="form-label">Campus Code *</label>
                                <input type="email" class="form-control" id="myCampusCode" required>
                            </div>
                            <div class="col-md-12">
                                <label for="class" class="form-label">Campus Address *</label>
                                <input type="text" class="form-control" id="myCampusAddress" required>
                            </div>
                            <div class="col-md-12">
                                <label for="class" class="form-label">Mobile *</label>
                                <input type="text" class="form-control" id="mymobile" required>
                            </div>
                            <div class="col-md-12">
                                <label for="class" class="form-label">Email *</label>
                                <input type="text" class="form-control" id="myemail" required>
                            </div>
                            <input type="hidden" id="myupdateID" name="id">
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


<script>


    async function FillUpUpdateForm(id) {
        try {
            document.getElementById('myupdateID').value = id;
            showLoader();
            let res = await axios.post("/campus-by-id", { id: id });
            hideLoader();

            if (res.status === 200) {
                const data = res.data;
                document.getElementById('myCampusName').value = data['CampusName'];
                document.getElementById('myCampusCode').value = data['CampusCode'] || '';
                document.getElementById('myCampusCode').value = data['CampusCode'] || '';
                document.getElementById('myCampusAddress').value = data['CampusAddress'] || '';
                document.getElementById('mymobile').value = data['mobile'] || '';
                document.getElementById('myemail').value = data['email'] || '';

            } else {
                errorToast("Failed to load visitors data!");
            }
        } catch (error) {
            hideLoader();
            errorToast(error.response?.data?.message || "An unexpected error occurred!");
        }
    }

    // Update Customer Data
    async function Update() {
        // Collect form values
        CampusName = document.getElementById('myCampusName').value;
        CampusCode = document.getElementById('myCampusCode').value;
        CampusAddress = document.getElementById('myCampusAddress').value;
        mobile = document.getElementById('mymobile').value;
        email =  document.getElementById('myemail').value;


        // Input validation
        if (CampusName.length === 0) {
            errorToast("Campus Name is required!");
        } else if (CampusCode.length === 0) {
            errorToast("Campus Code is required!");
        } else if (CampusAddress.length === 0) {
            errorToast("Campus Address is required!");
        } else if (mobile.length === 0) {
            errorToast("mobile  is required!");
        } else if (email.length === 0) {
            errorToast("email is required!");
        } else {
            try {
                // Close modal and show loader
                document.getElementById('update-modal-close').click();
                showLoader();

                // Send POST request
                let res = await axios.post("/campus-update", {
                    id: document.getElementById('myupdateID').value,
                    CampusName: CampusName,
                    CampusCode: CampusCode,
                    CampusAddress: CampusAddress,
                    mobile: mobile,
                    email: email
                });
                console.log(res.data)
                hideLoader();

                if (res.status === 200 && res.data === 1) {
                    successToast('updated successfully!');
                    document.getElementById("update-form").reset();
                    await getList();
                } else {
                    errorToast("Failed to update!");
                }
            } catch (error) {
                hideLoader();
                errorToast(error.response?.data?.message || "An unexpected error occurred!");
            }
        }
    }
</script>



