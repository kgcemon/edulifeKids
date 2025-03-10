<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Invoices</h6>

                    <div class="d-flex flex-column flex-sm-row gap-2">
                        <form action="{{ route('invoice.index') }}" method="GET" class="mb-2 mb-sm-0">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" name="search"
                                       placeholder="Search..." value="{{ request('search') }}">
                                <button class="btn btn-sm btn-primary" type="submit">
                                    <i class="fas fa-search"></i> Search
                                </button>
                            </div>
                        </form>
                        <button data-bs-toggle="modal" data-bs-target="#create-modal"
                                class="btn btn-sm btn-success">
                            <i class="fas fa-plus"></i> Create
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Student Name</th>
                                <th>Student ID</th>
                                <th>Invoice Number</th>
                                <th>Total</th>
                                <th>Discount</th>
                                <th>Create Date</th>
                                <th>Status</th>
                                <th>Payment Method</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($allInvoice as $invoice)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $invoice->StudentName }}</td>
                                    <td>{{ $invoice->StudentID }}</td>
                                    <td>{{ $invoice->invoice_number }}</td>
                                    <td>{{ number_format($invoice->total, 2) }}</td>
                                    <td>{{ number_format($invoice->discount, 2) }}</td>
                                    <td>{{ $invoice->created_at }}</td>
                                    <td>
                                            <span
                                                class="badge {{ $invoice->status == 'paid' ? 'bg-success' : ($invoice->status == 'pending' ? 'bg-warning' : 'bg-danger') }}">
                                                {{ ucfirst($invoice->status) }}
                                            </span>
                                    </td>
                                    <td>{{ $invoice->payment_method }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <button data-id="{{ $invoice->id }}" data-status="{{ $invoice->status }}"
                                                    data-payment-method="{{ $invoice->payment_method }}"
                                                    class="btn editBtn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editStatusModal">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <a href="{{ route('invoice.show', $invoice->id) }}"
                                               class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">No invoices found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center">
                        {!! $allInvoice->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Status Modal -->
<div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editStatusModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStatusModalLabel">Edit Invoice Status and Payment Method</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editStatusForm">
                    <input type="hidden" id="invoiceId" name="invoice_id">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="pending">Pending</option>
                            <option value="paid">Paid</option>
                            <option value="due">Due</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Payment Method</label>
                        <select class="form-select" id="payment_method" name="payment_method">
                            <option value="Mobile Banking">Mobile Banking</option>
                            <option value="Bank">Bank</option>
                            <option value="Cash">Cash</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateStatusBtn">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo2zlEbFHh9N6woI+Bq3e8wlKmd1yrfNtCSw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eQvcQVzAY"
        crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $('.editBtn').click(function () {
            var invoiceId = $(this).data('id');
            var currentStatus = $(this).data('status');
            var currentPaymentMethod = $(this).data('payment-method');

            $('#invoiceId').val(invoiceId);
            $('#status').val(currentStatus);
            $('#payment_method').val(currentPaymentMethod);

            // Show the modal
            var myModal = new bootstrap.Modal(document.getElementById('editStatusModal'));
            myModal.show();

        });

        $('#updateStatusBtn').click(function () {
            var invoiceId = $('#invoiceId').val();
            var newStatus = $('#status').val();
            var newPaymentMethod = $('#payment_method').val();

            $.ajax({
                url: '/invoices/' + invoiceId + '/update-status',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    status: newStatus,
                    payment_method: newPaymentMethod
                },
                success: function (response) {
                    // Update the table row with the new data
                    var row = $('[data-id="' + invoiceId + '"]').closest('tr');
                    row.find('td:nth-child(8)').html('<span class="badge ' + (newStatus == 'paid' ? 'bg-success' : (newStatus == 'pending' ? 'bg-warning' : 'bg-danger')) + '">' + newStatus.charAt(0).toUpperCase() + newStatus.slice(1) + '</span>');
                    row.find('td:nth-child(9)').text(newPaymentMethod);

                    // Update the edit button's data attributes
                    $('[data-id="' + invoiceId + '"]').data('status', newStatus);
                    $('[data-id="' + invoiceId + '"]').data('payment-method', newPaymentMethod);

                    // Close the modal
                    var myModalEl = document.getElementById('editStatusModal')
                    var modal = bootstrap.Modal.getInstance(myModalEl)
                    modal.hide()

                    //SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                        timer: 1500,
                        showConfirmButton: false
                    });

                },
                error: function (xhr, status, error) {
                    // Handle error (display error message)

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error updating status: ' + xhr.responseJSON.message,
                    })
                }
            });
        });

        $('#editStatusModal').on('hidden.bs.modal', function () {
            // Clear the form when the modal is closed
            $('#editStatusForm')[0].reset();
        });
    });
</script>
