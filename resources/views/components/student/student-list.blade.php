<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif


                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">All Student List</h6>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createStudentModal">
                            <i class="fas fa-plus me-1"></i> Create
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Campus</th>
                                <th>Batch</th>
                                <th>Shift</th>
                                <th>Admission Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr class="px-5">
                                    <td>{{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}</td>
                                    <td>{{ $student->StudentID }}</td>
                                    <td>{{ $student->StudentName }}</td>
                                    <td>{{ $student->Campus ?? 'N/A' }}</td>
                                    <td>{{ $student->Batch ?? 'N/A' }}</td>
                                    <td>{{ $student->Shift ?? 'N/A' }}</td>
                                    <td>{{ $student->AdmissionDate }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm delete-btn" onclick="return confirm('Are you sure?')" title="Delete"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        <nav aria-label="Student Pagination">
                            <ul class="pagination">
                                @if ($students->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link"><i class="fas fa-angle-double-left"></i></span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $students->previousPageUrl() }}" rel="prev"><i class="fas fa-angle-left"></i></a>
                                    </li>
                                @endif

                                @foreach ($students->getUrlRange(max(1, $students->currentPage() - 2), min($students->lastPage(), $students->currentPage() + 2)) as $page => $url)
                                    <li class="page-item {{ $page == $students->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach


                                @if ($students->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $students->nextPageUrl() }}" rel="next"><i class="fas fa-angle-right"></i></a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link"><i class="fas fa-angle-double-right"></i></span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


