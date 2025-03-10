<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $allInvoice = DB::table('invoice')
            ->when($search, function ($query, $search) {
                return $query->where('StudentName', 'like', '%' . $search . '%')
                    ->orWhere('StudentID', 'like', '%' . $search . '%')
                    ->orWhere('invoice_number', 'like', '%' . $search . '%');
            })
            ->paginate(50);

        return view('pages.dashboard.invoice-page', compact('allInvoice', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = DB::table('invoice')->where('id',$id)->first();
        return view('components.invoice.invoice',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Update the status of the specified resource in storage.
     */
    public function updateStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,due',
            'payment_method' => 'nullable|in:Mobile Banking,Bank,Cash', // Allow nullable
        ]);

        $invoice = DB::table('invoice')->find($id);

        if (!$invoice) {
            return response()->json(['message' => 'Invoice not found'], 404);
        }

        $updateData = ['status' => $request->status];

        // Only update payment_method if it's provided
        if ($request->has('payment_method')) {
            $updateData['payment_method'] = $request->payment_method;
        }

        DB::table('invoice')
            ->where('id', $id)
            ->update($updateData);

        return response()->json(['message' => 'Status updated successfully']);
    }
}
