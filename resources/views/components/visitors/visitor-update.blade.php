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
                                <label for="Name" class="form-label">Name *</label>
                                <input type="text" class="form-control" id="studentName" required>
                            </div>
                            <div class="col-md-12">
                                <label for="Email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="studentEmail" required>
                            </div>
                            <div class="col-md-12">
                                <label for="class" class="form-label">Address *</label>
                                <input type="text" class="form-control" id="studentaddress" required>
                            </div>
                            <div class="col-md-12">
                                <label for="class" class="form-label">Kids Name *</label>
                                <input type="text" class="form-control" id="KidsName" required>
                            </div>
                            <div class="col-md-12">
                                <label for="class" class="form-label">Kids Age *</label>
                                <input type="text" class="form-control" id="KidsAge" required>
                            </div>
                            <div class="col-md-12">
                                <label for="Mobile" class="form-label">Mobile *</label>
                                <input type="tel" class="form-control" id="studentMobile" required>
                            </div>
                            <label class="col-md-12">Interested in *</label>
                            <select id="visitorInterested" class="form-control">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                                <option value="na">N/A</option>
                            </select>

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


<script>


    async function FillUpUpdateForm(id) {
        try {
            document.getElementById('updateID').value = id;
            showLoader();
            let res = await axios.post("/visitors-by-id", { id: id });
            hideLoader();

            if (res.status === 200) {
                const data = res.data;
                document.getElementById('studentName').value = data['name'];
                document.getElementById('studentEmail').value = data['email'] || '';
                document.getElementById('studentMobile').value = data['mobile'] || '';
                document.getElementById('studentaddress').value = data['address'] || '';
                document.getElementById('KidsName').value = data['KidsName'] || '';
                document.getElementById('KidsAge').value = data['KidsAge'] || '';
                document.getElementById('visitorInterested').value = data['interested'] || '';

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
        let Name = document.getElementById('studentName').value.trim();
        let Email = document.getElementById('studentEmail').value.trim();
        let studentMobile = document.getElementById('studentMobile').value.trim();
        let address = document.getElementById('studentaddress').value.trim();
        let chilName = document.getElementById('KidsName').value.trim();
        let childAge = document.getElementById('KidsAge').value.trim();
        let userInterested = document.getElementById('visitorInterested').value.trim();
        let updateID = document.getElementById('updateID').value;

        // Input validation
        if (Name.length === 0) {
            errorToast("First Name is required!");
        } else if (studentMobile.length === 0) {
            errorToast("Mobile number is required!");
        } else if (address.length === 0) {
            errorToast("Class is required!");
        } else if (childAge.length === 0) {
            errorToast("Child's Date of Birth is required!");
        } else if (userInterested.length === 0) {
            errorToast("Expected Start Date is required!");
        } else {
            try {
                // Close modal and show loader
                document.getElementById('update-modal-close').click();
                showLoader();

                // Send POST request
                let res = await axios.post("/update-visitors", {
                    id: updateID,
                    name: Name,
                    email: Email,
                    mobile: studentMobile,
                    address: address,
                    KidsName: chilName,
                    KidsAge: childAge,
                    interested: userInterested,
                });

                hideLoader();

                if (res.status === 200 && res.data === 1) {
                    successToast('Customer updated successfully!');
                    document.getElementById("update-form").reset();
                    await getList();
                } else {
                    errorToast("Failed to update visitors!");
                }
            } catch (error) {
                hideLoader();
                errorToast(error.response?.data?.message || "An unexpected error occurred!");
            }
        }
    }
</script>



