<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{
    public function get(Request $request, $id)
    {
        $transaction = TransactionDetail::with('product')
            ->join('transactions', 'transaction_details.traisactions_id', '=', 'transactions.id')
            ->where('transactions.id', '=', $id)
            ->get();

        if ($transaction) {
            return ResponseFormater::success($transaction, "Data transaksi berhasil diambil");
        } else {
            return ResponseFormater::error(null, "Data transaksi tidak ada", 404);
        }
    }
}
