<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        	'product_id' => 'integer',
            'quantity' => 'integer'
        ]);

        try {

            $order = new Order;
            $order->product_id = $request->input('product_id');
            $order->quantity = $request->input('quantity');
            $order->save();

            //return successful response
            return response()->json(['Order' => $order, 'message' => 'You have successfully ordered this product'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'Failed to order this product due to unavailability of the stock'], 400);
        }

    }
}