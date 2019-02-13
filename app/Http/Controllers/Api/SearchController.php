<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class SearchController extends Controller
{
    /**
     * Search the products table.
     *
     * @param  Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        // First we define the error message we are going to show if no keywords
        // existed or if no results found.
        $error = ['error' => 'No results found, please try with different keywords.'];

        // Making sure the user entered a keyword.
        if ($request->has('q')) {

            // Using the Laravel Scout syntax to search the products table.
            $orders = Order::search($request->get('q'))->get();

            // If there are results return them, if none, return the error message.
            return $orders->count() ? $orders : $error;

        }

        // Return the error message if no keywords existed
        return $error;
    }
}