<?php

namespace App\Http\Controllers;

use App\Models\Merch;
use App\Http\Requests\StoreMerchRequest;
use App\Http\Requests\UpdateMerchRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

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

        return view('Merch.merch', compact('merch'));
    }

    public function cart() {
        if(Auth::check()){
            $logged_id = auth()->user()->id;
            $cart = Cart::where('user_id', '=', $logged_id)->get();
            $merches = Merch::all();

            // dd($cart);

            return view('Merch.cart')->with('cart', $cart)->with('merches', $merches);
        } else {
            return redirect('/login');
        }
        
    }

    public function addToCart(Request $request) {
        if(Auth::check()){
            $logged_id = auth()->user()->id;

            $cart = Cart::where('user_id', '=', $logged_id)->get();

            $flag = 'false';
            $size = $request->size;

            // dd($request->size);

            if ($request->id != 1 && $request->id != 2) {
                $size = '';
            }

            if (isset($cart[0])) {
                foreach ($cart as $merch) {

                    if ($merch->merch_id == $request->id) {
                        if ($merch->size == $request->size) {
                            $new_qty = $merch->qty + $request->qty;
                            $merch->update(['qty' => $new_qty]);

                            $flag = 'true';
                        }
                    }
                }

                if ($flag == 'false') {
                    Cart::create([
                        'user_id' => $logged_id,
                        'merch_id' => $request->id,
                        'qty' => $request->qty,
                        'size' => $size
                    ]);
                }
            } else {
                Cart::create([
                    'user_id' => $logged_id,
                    'merch_id' => $request->id,
                    'qty' => $request->qty,
                    'size' => $size
                ]);
            }

            session(['cart' => $cart]);

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
