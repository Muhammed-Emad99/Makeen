<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribes = Subscribe::all();
        return view('dashboard.subscribes.index', compact('subscribes'));
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Subscribe $order)
    {
        $order->delete();
        return response()->json(['success' => 'تم الحذف بنجاح']);
    }
}
