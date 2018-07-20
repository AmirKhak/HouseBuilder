<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'title' => 'required',
          'description' => 'required'
        ]);

        $order = new Order;
        $order->group = $request->input('group');
        $order->title = $request->input('title');
        $order->description = $request->input('description');
        $order->save();

        return redirect('/order')->with('success', 'Your order has been sent!');
    }

}
