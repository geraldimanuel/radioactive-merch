<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    static function new_order() {
        $order = Order::create([
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'phone' => 0,
            'line' => 'al',
            'image' => 'adad',
            'total_price' => 0,
            'status' => 'Unpaid'
        ]);

        return $order->id;
    }
}
