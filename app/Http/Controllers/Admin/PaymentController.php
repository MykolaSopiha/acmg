<?php

namespace App\Http\Controllers\Admin;

use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('admin.payments.index', compact('payments'));
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        return view('admin.payments.edit', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'amount' => 'required|number|min:0'
        ]);

        $payment = Payment::findOrFail($id);

        $payment->update([
            'amount' => $request['amount']
        ]);

        return redirect()->route('admin:payments.index')->with(['success' => 'Payment updated!']);
    }
}
