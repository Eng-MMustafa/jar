<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductCommentController extends Controller
{
    public function store(Request $request, Product $product)
    {
        if (! auth()->check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $data = $request->validate([
            'body' => 'required|string|max:1000',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        // Prevent a user from submitting more than one rating for the same product
        if (!empty($data['rating'])) {
            $existing = Comment::where('product_id', $product->id)
                ->where('user_id', auth()->id())
                ->whereNotNull('rating')
                ->exists();

            if ($existing) {
                return response()->json(['errors' => ['rating' => ['You have already rated this product.']]], 422);
            }
        }

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'body' => $data['body'],
            'rating' => $data['rating'] ?? null,
            'is_visible' => true,
        ]);

        $comment->load('user');

        // Return rendered HTML for immediate insertion
        $html = view('products._comment', compact('comment'))->render();

        return response()->json(['success' => true, 'html' => $html]);
    }
}
