<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $cartItems = [];

        foreach ($cart as $id => $item) {
            $product = Product::find($id);
            if ($product) {
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $item['quantity'],
                    'rental_period' => $item['rental_period'],
                    'total' => $this->calculateTotal($product, $item['quantity'], $item['rental_period'])
                ];
            }
        }

        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        $quantity = $request->input('quantity', 1);
        $rental_period = $request->input('rental_period', 'daily'); // daily, weekly, monthly

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'quantity' => $quantity,
                'rental_period' => $rental_period,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->input('quantity', 1);
            $cart[$id]['rental_period'] = $request->input('rental_period', 'daily');
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }

    private function calculateTotal($product, $quantity, $period)
    {
        $price = match ($period) {
            'daily' => $product->rental_price_daily,
            'weekly' => $product->rental_price_weekly,
            'monthly' => $product->rental_price_monthly,
            default => $product->rental_price_daily,
        };

        return $price * $quantity;
    }
}
