<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function receive_transactions(Request $request){
        $transaction = Transaction::find($request->trans_id);
        $transaction->status = "Received";
        $transaction->remarks = "-" . $request->remarks;
        $transaction->schedule = $request->schedule;
        $transaction->payable = $request->payable;
        $transaction->save();

        if (auth()->user()->role == "Admin"){
            return redirect('/admin-transactions');
        }elseif (auth()->user()->role == "Staff-Secretary"){
            return redirect('/secretary-transactions');
        }

    }

    public function decline_transactions(Request $request){
        $transaction = Transaction::find($request->trans_id);
        $transaction->status = "Decline";
        $transaction->save();
        if (auth()->user()->role == "Admin"){
            return redirect('/admin-transactions');
        }elseif (auth()->user()->role == "Staff-Secretary"){
            return redirect('/secretary-transactions');
        }

    }

    public function print_transactions(Request $request){
        $transaction = Transaction::find($request->trans_id);
        $transaction->status = "Completed";
        $transaction->or_no = $request->or_no;
        $transaction->validity = $request->validity;
        $transaction->save();
        return redirect('/print-transactions-complete/trans-id=' . $request->trans_id);
    }
}
