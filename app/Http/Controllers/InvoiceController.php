<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoice;
use App\Models\User;

class InvoiceController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'executorId' => 'required|integer',
            'period' => 'required|integer',
            'description' => 'required|string|max:512|min:32'
        ]);

        $invoice = Auth::user()->invoices()->create([
            'customer' => Auth::user()->username(),
            'executorId' => $request->customerId,
            'executor' => User::where('id', $request->executorId)->first()->username,
            'period' => $request->period,
            'description' => $request->description
        ]);

        return response()->json([
            'invoice' => $invoice
        ], 201);
    }
    public function change(Request $request, $invoice_id)
    {
        if(Invoice::where('customerId', Auth::id())->where('id', $invoice_id)->count())
        {
            $request->validate([
                'period' => 'required|integer',
                'description' => 'required|string|max:512|min:32'
            ]);
            $invoice = Invoice::where('customerId', Auth::id())->where('id', $invoice_id)->first()->get();
            $invoice->period = $request->period;
            $invoice->description = $request->description;
            $invoice->save();
            return request()->json([
                'message' => 'updated'
            ], 204);
        }
        else {
            return response()->json([
                'message' => 'not found'
            ], 404);
        }
    }
}