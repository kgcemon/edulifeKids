@extends('layout.sidenav-layout')
@section('content')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa; /* Light background */
        }

        .invoice-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 30px; /* Increased padding */
            border: 1px solid #dee2e6; /* Bootstrap border color */
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05); /* Softer shadow */
            background-color: #fff; /* White background for the container */
            border-radius: 0.5rem; /* Rounded corners */
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 30px; /* Increased margin */
            color: #343a40; /* Darker header text */
        }

        .invoice-details {
            margin-bottom: 30px; /* Increased margin */
        }

        .table-responsive {
            overflow-x: auto; /* Add horizontal scroll for small screens */
        }

        .table th,
        .table td {
            text-align: left;
            padding: 12px; /* Increased padding for table cells */
            border-color: #dee2e6; /* Consistent border color */
        }

        .table thead th {
            background-color: #e9ecef; /* Light gray header background */
            border-bottom-width: 2px; /* Thicker bottom border for the header */
            font-weight: 500; /* Slightly bolder header text */
        }

        .total-amount {
            text-align: right;
            margin-top: 30px; /* Increased margin */
            font-weight: bold;
            color: #28a745; /* Green color for total amount */
        }

        .print-button {
            text-align: center;
            margin-top: 30px; /* Increased margin */
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 123, 255, 0.25); /* Subtle shadow */
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        /* Status Styles */
        .status-pending {
            color: #ffc107; /* Yellow for pending */
        }

        .status-paid {
            color: #28a745; /* Green for paid */
        }

        .status-due {
            color: #dc3545; /* Red for due */
        }


        /* Print Styles */
        @media print {
            body {
                font-size: 12pt; /* Adjust font size for better readability */
            }

            .invoice-container {
                border: none;
                box-shadow: none;
            }

            .print-button {
                display: none;
            }

            /* Add any other print-specific styles here to optimize for printing */
        }
        .bold{
            font-weight: 700;
        }
    </style>
    <body>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Student Fee Invoice</h1>
            <p class="bold">{{$invoice->campus_name}}</p>
{{--            <p>Phone: (123) 456-7890</p>--}}
        </div>

        <div class="invoice-details">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Invoice To:</strong></p>
                    <p class="bold">{{$invoice->StudentName}}</p>

                    <p><strong>Status:</strong></p>
                    <p class="bold">
                        @if($invoice->status == 'pending')
                            <span class="status-pending">{{ ucfirst($invoice->status) }}</span>
                        @elseif($invoice->status == 'paid')
                            <span class="status-paid">{{ ucfirst($invoice->status) }}</span>
                        @elseif($invoice->status == 'due')
                            <span class="status-due">{{ ucfirst($invoice->status) }}</span>
                        @else
                            {{ ucfirst($invoice->status) }}
                        @endif
                    </p>
                </div>
                <div class="col-md-6 text-right">
                    <p><strong>Invoice Number:</strong> {{$invoice->invoice_number}}</p>
                    <p><strong>Invoice Date:</strong> {{$invoice->invoice_date}}</p>
                    <p><strong>Student ID:</strong> {{$invoice->StudentID}}</p>
                    @if($invoice->payment_method != null)
                        <p><strong>Payment Paid Date:</strong> {{$invoice->updated_at}}</p>
                        <p><strong>Payment Method:</strong> {{$invoice->payment_method}}</p>
                    @endif

                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Description</th>

                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$invoice->invoice_name}}</td>

                    <td>৳{{ number_format($invoice->total, 2) }}</td>
                </tr>
                <tr>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="total-amount">
            <p><strong>Subtotal:</strong> ৳{{ number_format($invoice->total + $invoice->discount, 2) }}</p>
            <p><strong>Discount:</strong> ৳{{ number_format($invoice->discount, 2) }}</p>
            <p><strong>Total:</strong> ৳{{ number_format($invoice->total, 2) }}</p>
        </div>


        <div class="print-button">
            <button class="btn btn-primary" onclick="window.print()">Print Invoice</button>
        </div>
    </div>
@endsection
