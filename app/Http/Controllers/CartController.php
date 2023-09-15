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
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function removeFromCart($cart_id) {
        if(Auth::check()){
            Cart::where('id', $cart_id)->delete();

            return redirect('/cart');
        } else {
            return redirect('/login');
        }

    }

    public function checkout(Request $request) {

        if(Auth::check()){
            $logged_id = auth()->user()->id;

            $user = User::find($logged_id);

            $existing_order = Order::find($user->name);

            // dd($existing_order);

            if (isset($existing_order)) {
                $detailTrans = DetailTransaction::where('order_id', $existing_order->id)->latest();
                $merchs = Merch::all();

                return view('Merch.checkout', [
                            'detailTrans' => $detailTrans,
                            'order' => $existing_order,
                            'merchs' => $merchs
                ]);
            } else {
                $cart = Cart::where('user_id', '=', $logged_id)->get();
                $total_qty = 0;
                $total_price = 0;
                $grandTotal = 0;

                // dd($cart);

                $order_id = Order::new_order();

                foreach ($cart as $key) {
                    $merch = Merch::find($key->merch_id);
                    $merch->save();

                    $total_price = $key->price * $key->qty;

                    // dd($total_price);

                    DetailTransaction::new_transaction($key->merch_id, $order_id, $key->qty, $total_price, $key->size);

                    $total_qty += $key->qty;
                    $grandTotal += $total_price;
                }

                Order::where('id', $order_id)->update([
                    'total_price' => $grandTotal,
                ]);

                $detailTrans = DetailTransaction::where('order_id', $order_id)->get();
                $merchs = Merch::all();
                $order = Order::where('id', $order_id)->first();

                return view('Merch.checkout', [
                            'detailTrans' => $detailTrans,
                            'order' => $order,
                            'merchs' => $merchs
                ]);
            }
        } else {
            return redirect('/login');
        }

    }

    public function dashboard() {
        $merchs = Merch::all();
        $orders = Order::all();
        $detailTrans = DetailTransaction::all();

        return view('Merch.dashboard', [
            'merchs' => $merchs,
            'orders' => $orders,
            'detailTrans' => $detailTrans
        ]);

        
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
