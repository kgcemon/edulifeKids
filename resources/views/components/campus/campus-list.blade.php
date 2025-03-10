<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card p-5">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h4>All Campus List</h4>
                    </div>
                    <div class="col-auto">
                        <button data-bs-toggle="modal" data-bs-target="#create-modal" class="btn btn-sm btn-primary bg-gradient">Create</button>
                    </div>
                </div>
                <hr class="bg-dark" />
                <!-- Add a wrapper around the table for scroll -->
                <div class="table-responsive">
                    <table class="table" id="tableData">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Campus Name</th>
                            <th>Campus Code</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tableList"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- View Modal -->
<div class="modal fade" id="view-modal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Admission Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="viewModalContent">
                <!-- Dynamic content will be populated here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        getList(); // Fetch the visitor data when the page loads
    });

    // Fetch and populate the visitor list
    async function getList() {
        try {
            const res = await axios.get("/campus-list");

            const tableList = $("#tableList");
            const tableData = $("#tableData");

            // Clear existing table data
            tableData.DataTable().destroy();
            tableList.empty();

            // Iterate through the visitor data and populate the table
            res.data.forEach((item, index) => {
                const row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.CampusName}</td>
                        <td>${item.CampusCode || 'N/A'}</td>
                        <td>${item.CampusAddress}</td>
                        <td>${item.mobile}</td>
                        <td>${item.email}</td>
                        <td>
                            <button data-id="${item.id}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                            <button data-id="${item.id}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                        </td>
                    </tr>
                `;
                tableList.append(row);
            });

            // Attach event listeners
            $(".editBtn").on("click", async function () {
                const id = $(this).data("id");
                await FillUpUpdateForm(id); // Presumed function to fill in update form
                $("#update-modal").modal("show");
            });

            $(".deleteBtn").on("click", function () {
                const id = $(this).data("id");
                $("#delete-modal").modal("show");
                $("#deleteID").val(id);
            });

            $(".viewBtn").on("click", function () {
                const data = $(this).data();
                populateViewModal(data); // Populate view modal with visitor data
                $("#view-modal").modal("show");
            });

            // Reinitialize DataTable with updated data
            new DataTable('#tableData', {
                order: [[0, 'desc']],
                lengthMenu: [5, 10, 15, 20, 30]
            });

        } catch (error) {
            console.error("Error fetching visitor data:", error);
        }
    }

    function populateViewModal(data) {
        const content = `
        <div class="modal-body">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-4 font-weight-bold">Name:</div>
                    <div class="col-8">${data.name}</div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-4 font-weight-bold">Email:</div>
                    <div class="col-8">${data.email}</div>
                </div><hr>
                <div class="row mb-3">
                    <div class="col-4 font-weight-bold">Mobile:</div>
                    <div class="col-8">${data.mobile}</div>
                </div><hr>
                <div class="row mb-3">
                    <div class="col-4 font-weight-bold">Address:</div>
                    <div class="col-8">${data.address}</div>
                </div><hr>
                <div class="row mb-3">
                    <div class="col-4 font-weight-bold">Child's Name:</div>
                    <div class="col-8">${data.kidsname}</div>
                </div><hr>
                <div class="row mb-3">
                    <div class="col-4 font-weight-bold">Child's Age:</div>
                    <div class="col-8">${data.kidsage}</div>
                </div><hr>
                <div class="row mb-3">
                    <div class="col-4 font-weight-bold">Interested in:</div>
                    <div class="col-8">${data.interested}</div>
                </div>
            </div>
        </div>
    `;
        $("#viewModalContent").html(content);
    }

</script>
