<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card p-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-6 col-12">
                        <h4>All Visitor List</h4>
                    </div>
                    <div class="col-md-6 col-12 text-md-end text-start mt-2 mt-md-0">
                        <button data-bs-toggle="modal" data-bs-target="#create-modal" class="btn btn-sm btn-primary bg-gradient">Create</button>
                    </div>
                </div>
                <hr class="bg-dark" />

                <!-- Responsive Table Wrapper -->
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap" id="tableData">
                        <thead>
                        <tr class="bg-light">
                            <th>No</th>
                            <th>Visitor Name</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Kids Name</th>
                            <th>Kids Age</th>
                            <th>Interested</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tableList"></tbody>
                    </table>
                </div>

                <div id="pagination" class="d-flex justify-content-center mt-3"></div>
            </div>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="create-modal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create Visitor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile">
                    </div>
                    <div class="mb-3">
                        <label for="KidsName" class="form-label">Kids Name</label>
                        <input type="text" class="form-control" id="KidsName" name="KidsName">
                    </div>
                    <div class="mb-3">
                        <label for="KidsAge" class="form-label">Kids Age</label>
                        <input type="text" class="form-control" id="KidsAge" name="KidsAge">
                    </div>
                    <div class="mb-3">
                        <label for="interested" class="form-label">Interested</label>
                        <input type="text" class="form-control" id="interested" name="interested">
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="create-btn" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Visitor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="edit_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="edit_address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="edit_address" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="edit_mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="edit_mobile" name="mobile">
                    </div>
                    <div class="mb-3">
                        <label for="edit_KidsName" class="form-label">Kids Name</label>
                        <input type="text" class="form-control" id="edit_KidsName" name="KidsName">
                    </div>
                    <div class="mb-3">
                        <label for="edit_KidsAge" class="form-label">Kids Age</label>
                        <input type="text" class="form-control" id="edit_KidsAge" name="KidsAge">
                    </div>
                    <div class="mb-3">
                        <label for="edit_interested" class="form-label">Interested</label>
                        <input type="text" class="form-control" id="edit_interested" name="interested">
                    </div>

                    <input type="hidden" id="edit_id" name="id">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="update-btn" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="view-modal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Visitor Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><b>Name:</b> <span id="view_name"></span></p>
                <p><b>Email:</b> <span id="view_email"></span></p>
                <p><b>Address:</b> <span id="view_address"></span></p>
                <p><b>Mobile:</b> <span id="view_mobile"></span></p>
                <p><b>Kids Name:</b> <span id="view_KidsName"></span></p>
                <p><b>Kids Age:</b> <span id="view_KidsAge"></span></p>
                <p><b>Interested:</b> <span id="view_interested"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        getList(1);

        // Create Visitor
        $("#create-btn").on('click', async function() {
            let formData = new FormData(document.getElementById("createForm"));
            try {
                const res = await axios.post("{{ route('create-visitors') }}", formData);
                if (res.status === 200) {
                    Swal.fire("Success!", "Visitor created successfully!", "success");
                    $("#create-modal").modal('hide');
                    document.getElementById("createForm").reset();
                    getList(1);
                } else {
                    Swal.fire("Error!", "Failed to create visitor.", "error");
                }
            } catch (error) {
                console.error("Error creating visitor:", error.response ? error.response.data : error.message);
                let errorMessage = "Failed to create visitor.  ";
                if (error.response && error.response.data && error.response.data.errors) {
                    for (let field in error.response.data.errors) {
                        errorMessage += error.response.data.errors[field].join(", ") + "  ";
                    }
                }
                Swal.fire("Error!", errorMessage, "error");
            }
        });

    });

    async function getList(page) {
        try {
            const res = await axios.get(`/visitors-list?page=${page}`);
            const tableList = $("#tableList");
            const tableData = $("#tableData");
            const pagination = $("#pagination");

            tableData.DataTable().destroy();
            tableList.empty();
            pagination.empty();

            res.data.data.forEach((item, index) => {
                const row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.name}</td>
                        <td>${item.address || 'N/A'}</td>
                        <td>${item.mobile}</td>
                         <td>${item.KidsName || 'N/A'}</td>
                        <td>${item.KidsAge|| 'N/A'}</td>
                        <td>${item.interested|| 'N/A'}</td>
                        <td class="text-nowrap">
                            <button data-id="${item.id}" class="btn btn-sm btn-outline-success edit-btn">Edit</button>
                            <button data-id="${item.id}" class="btn btn-sm btn-outline-danger delete-btn">Delete</button>
                            <button data-id="${item.id}" class="btn btn-sm btn-outline-warning view-btn">View</button>
                        </td>
                    </tr>
                `;
                tableList.append(row);
            });

            res.data.links.forEach(link => {
                if (link.url) {
                    pagination.append(`<button class='btn btn-sm btn-outline-primary m-1' onclick='getList(${link.url.split("=")[1]})'>${link.label}</button>`);
                } else {
                    pagination.append(`<button class='btn btn-sm btn-outline-secondary m-1' disabled>${link.label}</button>`);
                }
            });

            //Edit functionality
            $(".edit-btn").on("click", async function() {
                let id = $(this).data('id');
                $("#edit_id").val(id);

                try {
                    const res = await axios.post('/visitors-by-id', { id: id, _token: '{{ csrf_token() }}' });
                    let visitor = res.data;

                    $("#edit_name").val(visitor.name);
                    $("#edit_email").val(visitor.email);
                    $("#edit_address").val(visitor.address);
                    $("#edit_mobile").val(visitor.mobile);
                    $("#edit_KidsName").val(visitor.KidsName);
                    $("#edit_KidsAge").val(visitor.KidsAge);
                    $("#edit_interested").val(visitor.interested);

                    $("#edit-modal").modal('show');

                } catch (error) {
                    console.error("Error fetching visitor data:", error);
                    Swal.fire("Error!", "Failed to fetch visitor data for editing.", "error");
                }
            });
            // Update Visitor
            $("#update-btn").on('click', async function() {
                let id = $("#edit_id").val();
                let formData = new FormData(document.getElementById("editForm"));
                formData.append('id', id);

                try {
                    const res = await axios.post('/update-visitors', formData);
                    if (res.status === 200) {
                        Swal.fire("Success!", "Visitor updated successfully!", "success");
                        $("#edit-modal").modal('hide');
                        getList(1); // Refresh the list
                    } else {
                        Swal.fire("Error!", "Failed to update visitor.", "error");
                    }
                } catch (error) {
                    console.error("Error updating visitor:", error.response ? error.response.data : error.message);
                    let errorMessage = "Failed to update visitor.  ";
                    if (error.response && error.response.data && error.response.data.errors) {
                        for (let field in error.response.data.errors) {
                            errorMessage += error.response.data.errors[field].join(", ") + "  ";
                        }
                    }
                    Swal.fire("Error!", errorMessage, "error");
                }
            });


            // View functionality
            $(".view-btn").on("click", async function() {
                let id = $(this).data('id');

                try {
                    const res = await axios.post('/visitors-by-id', { id: id, _token: '{{ csrf_token() }}' });
                    let visitor = res.data;

                    $("#view_name").text(visitor.name);
                    $("#view_email").text(visitor.email || 'N/A');
                    $("#view_address").text(visitor.address || 'N/A');
                    $("#view_mobile").text(visitor.mobile || 'N/A');
                    $("#view_KidsName").text(visitor.KidsName || 'N/A');
                    $("#view_KidsAge").text(visitor.KidsAge || 'N/A');
                    $("#view_interested").text(visitor.interested || 'N/A');

                    $("#view-modal").modal('show');

                } catch (error) {
                    console.error("Error fetching visitor data:", error);
                    Swal.fire("Error!", "Failed to fetch visitor data for viewing.", "error");
                }
            });

            // Delete functionality
            $(".delete-btn").on("click", async function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        try {
                            const res = await axios.post('/delete-visitors', { id: id, _token: '{{ csrf_token() }}' });
                            if (res.status === 200) {
                                Swal.fire("Deleted!", "Visitor has been deleted.", "success");
                                getList(1); // Refresh the list
                            } else {
                                Swal.fire("Error!", "Failed to delete visitor.", "error");
                            }
                        } catch (error) {
                            console.error("Error deleting visitor:", error);
                            Swal.fire("Error!", "Failed to delete visitor.", "error");
                        }
                    }
                });
            });


        } catch (error) {
            console.error("Error fetching visitor data:", error);
            Swal.fire("Error!", "Failed to load visitor data.", "error");
        }
    }
</script>
