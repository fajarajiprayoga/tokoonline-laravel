<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'traisactions_id',
        'products_id'
    ];

    // public function transactions()
    // {
    //     return $this->belongsTo(Transaction::class, 'traisactions_id', 'id');
    // }

    public function product()
    {
        return $this->hasMany(Product::class, 'id', 'products_id');
    }
}
