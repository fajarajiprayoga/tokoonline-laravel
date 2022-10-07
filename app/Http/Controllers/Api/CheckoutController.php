<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Http\Requests\Api\CheckoutRequest;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $data = $request->except('transaction_details');
        $data['uuid'] = 'TRX' . mt_rand(10000, 99999) . mt_rand(100, 999);

        $transaction = Transaction::create($data);

        foreach ($request->transaction_details as $product) {
            $details[] = new TransactionDetail([
                'traisactions_id' => $transaction->id,
                'products_id' => $product
            ]);

            Product::find($product)->decrement('quantity');
        }

        foreach ($details as $dt) {
            $transactionDetail = new TransactionDetail;
            $transactionDetail->traisactions_id = $dt->traisactions_id;
            $transactionDetail->products_id = $dt->products_id;
            $transactionDetail->save();
        }

        return ResponseFormater::success($transaction, "Berhasil checkout");
    }
}
