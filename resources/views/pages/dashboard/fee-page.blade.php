@extends('layout.sidenav-layout')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card p-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-md-6 col-12">
                            <h4>Fee Management</h4>
                        </div>
                        <div class="col-md-6 col-12 text-md-end text-start mt-2 mt-md-0">
                            <button data-bs-toggle="modal" data-bs-target="#create-modal" class="btn btn-sm btn-primary bg-gradient">Add Fee</button>
                        </div>
                    </div>
                    <hr class="bg-dark" />

                    <!-- Responsive Table Wrapper -->
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap">
                            <thead>
                            <tr class="bg-light">
                                <th>ID</th>
                                <th>Fee Type</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fees as $fee)
                                <tr>
                                    <td>{{ $fee->id }}</td>
                                    <td>{{ $fee->feeType }}</td>
                                    <td>{{ $fee->amount }}</td>
                                    <td>{{ $fee->status }}</td>
                                    <td>
                                        <button data-bs-toggle="modal" data-bs-target="#edit-modal-{{ $fee->id }}" class="btn btn-sm btn-outline-primary">Edit</button>
                                        <form action="{{ route('fee.destroy', $fee->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this fee?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Edit Modal for each Fee -->
                                <div class="modal fade" id="edit-modal-{{ $fee->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $fee->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel-{{ $fee->id }}">Edit Fee</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('fee.update', $fee->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="editFeeType-{{ $fee->id }}" class="form-label">Fee Type</label>
                                                        <input type="text" class="form-control" id="editFeeType-{{ $fee->id }}" name="feeType" value="{{ $fee->feeType }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editAmount-{{ $fee->id }}" class="form-label">Amount</label>
                                                        <input type="number" class="form-control" id="editAmount-{{ $fee->id }}" name="amount" value="{{ $fee->amount }}" min="0" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editStatus-{{ $fee->id }}" class="form-label">Status</label>
                                                        <select class="form-select" id="editStatus-{{ $fee->id }}" name="status" required>
                                                            <option value="active" {{ $fee->status == 'active' ? 'selected' : '' }}>Active</option>
                                                            <option value="inactive" {{ $fee->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        {{ $fees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="create-modal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Add Fee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('fee.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="feeType" class="form-label">Fee Type</label>
                            <input type="text" class="form-control" id="feeType" name="feeType" required>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" min="0" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(session('success'))
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
        @endif

        @if(session('error'))
        Swal.fire({
            title: 'Error!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        @endif
    </script>
@endsection
