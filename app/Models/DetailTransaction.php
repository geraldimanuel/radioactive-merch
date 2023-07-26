<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function new_transaction($merch_id, $order_id, $qty, $total_price) {
        DetailTransaction::create([
            'merch_id' => $merch_id,
            'order_id' => $order_id,
            'qty' => $qty,
            'total_price' => $total_price
        ]);
    }
}
