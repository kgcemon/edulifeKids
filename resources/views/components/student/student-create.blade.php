
<!-- Modal -->
<div class="modal fade" id="createStudentModal" tabindex="-1" aria-labelledby="createStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createStudentModalLabel">Create New Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your form goes here -->
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="mb-3">
                        <label for="StudentID" class="form-label">Student ID</label>
                        <input type="text" class="form-control" id="StudentID" name="StudentID" required>
                    </div>
                    <div class="mb-3">
                        <label for="StudentName" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="StudentName" name="StudentName" required>
                    </div>

                    <div class="mb-3">
                        <label for="StudentName" class="form-label">Father Name</label>
                        <input type="text" class="form-control" id="StudentName" name="Fnumber" required>
                    </div>

                    <div class="mb-3">
                        <label for="StudentName" class="form-label">Mather Name</label>
                        <input type="text" class="form-control" id="StudentName" name="Mnumber" required>
                    </div>


                    <div class="mb-3">
                        <label for="FeeType" class="form-label">Fee Type</label>
                        <select class="form-select" id="feeType" name="FeeType">
                            <option value="">Select A Fee Type</option>
                            @foreach($feeType as $id => $feeTypes)
                                <option value="{{ $feeTypes }}">{{ $feeTypes }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="Discount" class="form-label">Discount</label>
                        <input type="number" class="form-control" id="Discount" name="Discount" required>
                    </div>



                    <div class="mb-3">
                        <label for="Campus" class="form-label">Campus</label>
                        <select class="form-select" id="Campus" name="Campus">
                            <option value="">Select Campus</option>
                            @foreach($campuses as $id => $CampusName)
                                <option value="{{ $CampusName }}">{{ $CampusName }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="Shift" class="form-label">Shift</label>
                        <select class="form-select" id="Shift" name="Shift">
                            <option value="">Select Shift</option>
                            @foreach($shifts as $id => $name)
                                <option value="{{ $name }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="Batch" class="form-label">Batch</label>
                        <select class="form-select" id="Batch" name="Batch">
                            <option value="">Select Batch</option>
                            @foreach($batches as $id => $BatchName)
                                <option value="{{ $BatchName }}">{{ $BatchName }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="Session" class="form-label">Session</label>
                        <select class="form-select" id="Session" name="Session">
                            <option value="">Select Session</option>
                            @foreach($sessions as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="AdmissionDate" class="form-label">Admission Date</label>
                        <input type="date" class="form-control" id="AdmissionDate" name="AdmissionDate" required>
                    </div>

                    <div class="mb-3">
                        <label for="Campus" class="form-label">Status</label>
                        <select class="form-select" id="Campus" name="Status">
                            <option value="">Select</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
