<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('backend.home.index', compact('orders'));
    }

    public function invoicePrint($id)
    {
        $orders = Order::find($id);
        return view('backend.invoice.invoice', compact('orders'));

    }
}
