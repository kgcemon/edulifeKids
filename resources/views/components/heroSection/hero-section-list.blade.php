<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card p-5">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h4>All</h4>
                    </div>
                    <div class="col-auto">
                        <button data-bs-toggle="modal" data-bs-target="#create-modal" class="btn btn-sm btn-primary bg-gradient">Create</button>
                    </div>
                </div>
                <hr class="bg-dark" />
                <div class="table-responsive">
                    <table class="table" id="tableData">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>title</th>
                            <th>desc</th>
                            <th>image</th>
                            <th>image2</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tableList">
                        @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->description}}</td>
                                <td><img height="50" src="{{$item->image}}" alt=""></td>
                                <td><img height="50" src="{{$item->image2}}" alt=""></td>
                                <td>
                                    <button data-id="${item.id}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                                    <button data-id="${item.id}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
