<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Merch;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\DetailTransaction;
use App\Models\Order;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function removeFromCart($id_merch) {

        if(Auth::check()){
           $cart = session('cart');
            unset($cart[$id_merch]);
            session(['cart' => $cart]);

            Cart::where('merch_id', $id_merch)->delete();

            return redirect('/cart');
        } else {
            return redirect('/login');
        }

    }

    public function checkout() {

        if(Auth::check()){

            if (session('cart') == null) {
                $detailTrans = DetailTransaction::where('order_id', session('order_id'))->get();

                return view('Merch.checkout')->with('detailTrans', $detailTrans);
            } else {
                $cart = session('cart');
                $total_qty = 0;
                $total_price = 0;
                $grandTotal = 0;

                $order_id = Order::new_order();
                session(['order_id' => $order_id]);

                foreach ($cart as $key) {
                    $merch = Merch::find($key->id);
                    $merch->stock = $merch->stock - 1;
                    $merch->save();

                    Cart::where('merch_id', $key->id)->delete();

                    $total_price = $key->price * $key->qty;

                    DetailTransaction::new_transaction($key->id, $order_id, $key->qty, $total_price);

                    $total_qty += $key->qty;
                    $grandTotal += $total_price;
                }

                Order::where('id', $order_id)->update([
                    'qty' => $total_qty,
                    'total_price' => $grandTotal
                ]);

                session()->forget('cart');

                $detailTrans = DetailTransaction::where('order_id', $order_id)->get();

                return view('Merch.checkout')->with('detailTrans', $detailTrans);
            }
        } else {
            return redirect('/login');
        }

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
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}