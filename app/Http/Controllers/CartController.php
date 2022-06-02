<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function index()
    {
        $wishlist = Cart::where('user_id', auth()->user()->id)->get();
        return view('user.my-cart', compact('wishlist'));
    }
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->productId); //get product
        $user = auth()->user(); //get authenticated user

        $exists = $user->with('cart')->where('id', $user->id)->first(); //check if user already has a cart
        if ($exists->count()) {
            // Alert::info('You haved already added');
            return response(['msg' => 'Already added to cart'], 200);
        }

        $cart = Cart::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'variant_id' => $request->variantId,
        ]);

        if ($cart) {
            return response(['msg' => 'Product added to cart'], 201);
        } else {
            abort(500, 'Something went wrong');
        }
    }

    //mass delete
    public function destroySelected(Request $request)
    {
        $cartItems = Cart::where('user_id', auth()->user()->id)->whereIn('id', $request->cart)->get(); //get all cart ids
        foreach ($cartItems as $item) {
            $item->delete();
        }
        return ['delete' => "success"];
    }

    public function all()
    {
        $cartItems = Cart::where('user_id', auth()->user()->id)->with('product.getImage')->get();

        return $cartItems;
    }

    public function wishlist()
    {
        $wishlistItems = Cart::where('user_id', auth()->user()->id)->where('wishlist', 1)->with('product.getImage')->get();

        return $wishlistItems;
    }

    public function wishlistAdd(Request $request)
    {
        $cart = Cart::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        if ($cart) {
            Alert::success('Produk ditambahkan ke wishlist');
            return redirect()->back();
        } else {
            abort(500, 'Something went wrong');
        }
    }

    public function wishlistDestroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->back();
    }
}
