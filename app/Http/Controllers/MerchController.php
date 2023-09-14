<?php

namespace App\Http\Controllers;

use App\Models\Merch;
use App\Http\Requests\StoreMerchRequest;
use App\Http\Requests\UpdateMerchRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Http\Request;

class MerchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $merch = Merch::all();
        return view('Merch.index', [
            'merch' => $merch
        ]);
    }

    public function home()
    {
        $merch = Merch::all();
        return view('Merch.list')->with('merch', $merch);
    }

    public function merch() {
        if(Auth::check()){
            $cart = session('cart');
            return view('Merch.merch')->with('cart', $cart);
        } else {
            return redirect('/login');
        }
        
    }

    public function ShowItem($id) 
    {
        $merch = Merch::find($id);
        
        // dd($merch);    
        return view('Merch.merch', compact('merch'));
    }

    public function cart() {
        if(Auth::check()){
            $cart = session('cart');
            return view('Merch.cart')->with('cart', $cart);
        } else {
            return redirect('/login');
        }
        
    }

    public function addToCart(Request $request) {
        if(Auth::check()){
            $logged_id = auth()->user()->id;

            $cart = session('cart');
            $merch = Merch::find($request->id);
            $cart[$request->id] = $merch;
            $cart[$request->id]->qty = $request->qty;
            $cart[$request->id]->size = $request->size;
            $cart[$request->id]->tee = $request->tee;
            session(['cart' => $cart]);

            Cart::create([
                'user_id' => $logged_id,
                'merch_id' => $request->id,
                'qty' => $request->qty
            ]);

            return redirect('/cart');
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
    public function store(StoreMerchRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Merch $merch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merch $merch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMerchRequest $request, Merch $merch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merch $merch)
    {
        //
    }
}
