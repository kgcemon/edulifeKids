<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            @if(session("success"))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session("error"))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm border-0">
                <div class="card-header d-flex justify-content-between text-white bg-primary">
                    <h4 class="mb-0 text-white">School Academic Sessions</h4>
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="btn btn-sm btn-light">Add New Session</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tableData">
                            <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Academic Year</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allSession as $allSessions)
                                <tr>
                                    <td>{{$allSessions->id}}</td>
                                    <td>{{$allSessions->year}}</td>
                                    <td>
                                        <button data-id="{{$allSessions->id}}" class="btn btn-sm btn-outline-danger deleteBtn">Remove</button>
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
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="delete-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title text-white" id="delete-modalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to remove this session? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <form id="delete-form" method="POST" action="" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="deleteID" name="id" value="">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Attach event handler for delete button click
    $(".deleteBtn").on("click", function () {
        const id = $(this).data("id");
        const deleteUrl = "{{ route('session.destroy', ':id') }}".replace(':id', id);
        // Set the form action to the delete route with the session ID
        $("#delete-form").attr("action", deleteUrl);
        // Show the modal
        $("#delete-modal").modal("show");
    });
</script>
