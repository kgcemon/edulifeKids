<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="Name" class="form-label">Student Name *</label>
                                <input type="text" class="form-control" id="studentName" required>
                            </div>
                            <div class="col-md-12">
                                <label for="Email" class="form-label">Student ID *</label>
                                <input type="text" class="form-control" id="studentID" required>
                            </div>
                            <div class="col-md-12">
                                <label for="Campus" class="form-label">Campus *</label>
                                <input type="text" class="form-control" id="studentCampus" required>
                            </div>
                            <div class="col-md-12">
                                <label for="Shift" class="form-label">Shift *</label>
                                <input type="text" class="form-control" id="studentShift" required>
                            </div>
                            <div class="col-md-12">
                                <label for="Batch" class="form-label">Batch *</label>
                                <input type="text" class="form-control" id="studentBatch" required>
                            </div>
                            <div class="col-md-12">
                                <label for="AdmissionDate" class="form-label">Admission Date *</label>
                                <input type="date" class="form-control" id="admissionDate" required>
                            </div>
                            <div class="col-md-12">
                                <label for="Fnumber" class="form-label">Fnumber *</label>
                                <input type="number" class="form-control" id="studentFnumber" required>
                            </div>
                            <div class="col-md-12">
                                <label for="Mnumber" class="form-label">Mobile Number *</label>
                                <input type="number" class="form-control" id="studentMnumber" required>
                            </div>
                            <div class="col-md-12">
                                <label for="Session" class="form-label">Session *</label>
                                <input type="text" class="form-control" id="studentSession" required>
                            </div>
                            <div class="col-md-12">
                                <label for="Status" class="form-label">Status *</label>
                                <select id="studentStatus" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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

<script>

    async function FillUpUpdateForm(id) {
        try {
            document.getElementById('updateID').value = id;
            showLoader();
            let res = await axios.post("/student-by-id", { id: id });
            hideLoader();

            if (res.status === 200) {
                const data = res.data;
                document.getElementById('studentName').value = data['StudentName'] || '';
                document.getElementById('studentID').value = data['StudentID'] || '';
                document.getElementById('studentCampus').value = data['Campus'] || '';
                document.getElementById('studentShift').value = data['Shift'] || '';
                document.getElementById('studentBatch').value = data['Batch'] || '';
                document.getElementById('admissionDate').value = data['AdmissionDate'] || '';
                document.getElementById('studentFnumber').value = data['Fnumber'] || '';
                document.getElementById('studentMnumber').value = data['Mnumber'] || '';
                document.getElementById('studentSession').value = data['Session'] || '';
                document.getElementById('studentStatus').value = data['Status'] || '';

            } else {
                errorToast("Failed to load student data!");
            }
        } catch (error) {
            hideLoader();
            errorToast(error.response?.data?.message || "An unexpected error occurred!");
        }
    }

    // Update Student Data
    async function Update() {
        // Collect form values
        let StudentName = document.getElementById('studentName').value.trim();
        let StudentID = document.getElementById('studentID').value.trim();
        let Campus = document.getElementById('studentCampus').value.trim();
        let Shift = document.getElementById('studentShift').value.trim();
        let Batch = document.getElementById('studentBatch').value.trim();
        let AdmissionDate = document.getElementById('admissionDate').value.trim();
        let Fnumber = document.getElementById('studentFnumber').value.trim();
        let Mnumber = document.getElementById('studentMnumber').value.trim();
        let Session = document.getElementById('studentSession').value.trim();
        let Status = document.getElementById('studentStatus').value.trim();
        let updateID = document.getElementById('updateID').value;

        // Input validation
        if (!StudentName) return errorToast("Student Name is required!");
        if (!StudentID) return errorToast("Student ID is required!");
        if (!Campus) return errorToast("Campus is required!");
        if (!Shift) return errorToast("Shift is required!");
        if (!Batch) return errorToast("Batch is required!");
        if (!AdmissionDate) return errorToast("Admission Date is required!");
        if (!Fnumber) return errorToast("Fnumber is required!");
        if (!Mnumber) return errorToast("Mobile Number is required!");
        if (!Session) return errorToast("Session is required!");
        if (!Status) return errorToast("Status is required!");

        try {
            // Close modal and show loader
            document.getElementById('update-modal-close').click();
            showLoader();

            // Send POST request
            let res = await axios.post("/update-student", {
                id: updateID,
                StudentName: StudentName,
                StudentID: StudentID,
                Campus: Campus,
                Shift: Shift,
                Batch: Batch,
                AdmissionDate: AdmissionDate,
                Fnumber: Fnumber,
                Mnumber: Mnumber,
                Session: Session,
                Status: Status,
            });

            hideLoader();

            if (res.status === 200 && res.data === 1) {
                successToast('Student updated successfully!');
                document.getElementById("update-form").reset();
                getList();
                await LoadData();
            } else {
                errorToast("Failed to update student!");
            }
        } catch (error) {
            hideLoader();
            errorToast(error.response?.data?.message || "An unexpected error occurred!");
        }
    }
</script>
