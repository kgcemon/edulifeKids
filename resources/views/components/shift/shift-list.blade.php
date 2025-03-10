<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card p-5">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h4>All Shift List</h4>
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
                        <tr class="bg-light">
                            <th>Shift Name</th>
                            <th>Description</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tableList">

                        @foreach($shifts as $allShift)
                            <tr>
                                <td>{{$allShift['name']}}</td>
                                <td>{{$allShift['description']}}</td>
                                <td>{{$allShift['active']}}</td>
                                <td>
                                    <button data-id="{{$allShift['id']}}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
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
                <h5 class="modal-title" id="viewModalLabel">Shift Details</h5>
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

    $(".deleteBtn").on("click", function () {
        const id = $(this).data("id");
        $("#delete-modal").modal("show");
        $("#deleteID").val(id);
    });

    $(".editBtn").on("click", async function () {
        const id = $(this).data("id");
        await FillUpUpdateForm(id); // Presumed function to fill in update form
        $("#update-modal").modal("show");
    });
</script>

