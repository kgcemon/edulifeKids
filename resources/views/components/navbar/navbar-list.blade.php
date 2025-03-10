<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card p-5">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h4>All NavBar</h4>

                        @if(session()->has("success"))
                            <div class="alert-success">
                                {{session("success")}}
                            </div>
                        @endif


                        @if(session()->has("error"))
                            <div class="alert-danger">
                                {{session("error")}}
                            </div>
                        @endif

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
                            <th>Name</th>
                            <th>Url</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tableList">
                        @foreach($allNavBar as  $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->link}}</td>
                                <td>
                                    <form action="{{route('navbar.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                                    </form>

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
