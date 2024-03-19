<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = Cart::create([
            'product_id' => $request->product_id,
            'price'      => $request->price,
            'qty'        => $request->qty ? $request->qty : 1,
            'ip_address' => $request->ip(),
            
        ]);
        return redirect()->back()->with('success','Product has been Added To Cart');
    }

    public function cartDelete($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('success', 'Cart Product has been Deleted');
    }

    public function confirmOrder(Request $request)
    {
        
        $order = new Order();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->total_qty = $request->total_qty;
        $order->total_price = $request->total_price;
        $order->save();
        
        if($order->save()){
            
            $cartProducts = Cart::all();
            foreach($cartProducts as $cartProduct){
                $cartProduct->delete();
            }
        }
        return redirect()->back()->with('success', 'Order Product Has Been Successfull');
    }
}
