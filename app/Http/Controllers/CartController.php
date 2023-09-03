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
use Illuminate\Http\Request;

class   CartController extends Controller
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

    public function checkout(Request $request) {

        if(Auth::check()){

            if (session('cart') == null) {
                $detailTrans = DetailTransaction::where('order_id', session('order_id'))->get();
                $order = Order::where('id', session('order_id'))->first();
                $merchs = Merch::all();

                return view('Merch.checkout', [
                    'detailTrans' => $detailTrans,
                    'order' => $order,
                    'merchs' => $merchs
                ]);
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
                $merchs = Merch::all();
                $order = Order::where('id', $order_id)->first();

                // dd($order);

                // $request->request->add(['total_price' => $request->qty * 75000, 'status' => 'Unpaid']);
                // $order = Order::create($request->all());

                // Set your Merchant Server Key
                \Midtrans\Config::$serverKey = config('midtrans.server_key');
                // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                \Midtrans\Config::$isProduction = false;
                // Set sanitization on (default)
                \Midtrans\Config::$isSanitized = true;
                // Set 3DS transaction for credit card to true
                \Midtrans\Config::$is3ds = true;

                $params = array(
                    'transaction_details' => array(
                        'order_id' => $order->id,
                        'gross_amount' => $order->total_price,
                    ),
                    'customer_details' => array(
                        'first_name' => $order->name,
                        'last_name' => '',
                        'email' => $order->email,
                        'phone' => $order->phone,
                    ),
                );

                $snapToken = \Midtrans\Snap::getSnapToken($params);
                // dd($snapToken);
                return view('Merch.checkout', compact('snapToken','detailTrans', 'merchs', 'order'));
                // return view('Tickets.checkout', compact('order', 'snapToken'));


                // ->with([
                //     'detailTrans' => $detailTrans,
                //     'merchs' => $merches,
                //     'order' => $order_details,
                //     'snapToken' => $snapToken
                    
                // ]);
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
