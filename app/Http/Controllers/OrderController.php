<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Merch.checkout');
    }

    public function checkout(Request $request)
    {

    }
    public function orderPage() {
        if(Auth::check()){
            $cart = session('cart');
            return view('Merch.cart')->with('cart', $cart);
        } else {
            return redirect('/login');
        }
    }
    
    public function order(Request $request) {
        if(Auth::check()){
            Order::create([
                'name' => $request->name,
                'email' => $request->email,
                'wa' => $request->wa,
                'line' => $request->line,
                'image' => $request->file('payment_proof')->storePublicly('payment_images_merch', 'public'),
                'total_price' => $request->total_price,
                'status' => 'Unpaid'
            ]);

            return redirect('/merch');
        } else {
            return redirect('/login');
        }
    }

    public function invoice($id)
    {
        $order = Order::find($id);
        return view('Tickets.invoice', compact('order'));
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
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}