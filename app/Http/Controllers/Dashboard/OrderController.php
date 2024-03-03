<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('dashboard.orders.index', compact('orders'));
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(['success' => 'تم الحذف بنجاح']);
    }
}
