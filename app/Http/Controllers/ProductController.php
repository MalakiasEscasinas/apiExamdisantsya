<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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

            $product = new Product;
            $product->product_id = $request->input('product_id');
            $product->quantity = $request->input('quantity');
            $product->save();

            //return successful response
            return response()->json(['Product' => $product, 'message' => 'You have successfully ordered this product'], 201);

        } catch (\Exception $e) {
        	dd($e);
            //return error message
            return response()->json(['message' => 'Failed to order this product due to unavailability of the stock'], 400);
        }

    }
}