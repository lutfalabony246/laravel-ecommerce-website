<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PosCartController extends Controller
{
    //ajax request
    public function getCarts()
    {
        $carts = $this->getCartsItems();
        // session()->pull('carts');
        return response()->json(compact('carts'));
    }

    private function getCartsItems()
    {
        $carts   = session()->get('carts');
        $carts   = json_decode($carts);

        if (!$carts) {
            $carts = [];
        }
        return $carts;
    }

    public function addProductToCart(Request $request, $role, $product_id)
    {
        $carts = $this->getCartsItems();
        if ($this->checkProductExist($carts, $product_id)) {
            return response()->json(['error' => "Product Already Added To Cart"], 422);
        }
        $product = Product::find($product_id);
        if (!$product) {
            return response()->json(['error' => "Product Not Found"], 404);
        }
        $item = array(
            'product_id' => $product_id,
            'product_name' => $product->product_name,
            'stock' => $product->product_qty,
            'qty'  => 1,
            'price' => $product->selling_price,
        );
        $item = array("{$product_id}" => $item);
        array_push($carts, $item);
        session()->put('carts', json_encode($carts));
        return response()->json(compact('item'));
    }

    public function updateQuantity(Request $request, $product_id, $qty, $slug)
    {

        $carts = $this->getCartsItems();
        $product = Product::find($product_id);
        if (!$product) {
            return response()->json(['error' => "Product Not Found"], 404);
        }
        if (!$this->checkProductExist($carts, $product_id)) {
            return response()->json(['error' => "Product Already Added To Cart"], 422);
        }

        $item  = $this->getItem($product_id);
        // dd($item);
        $item_key  = null;
        if ($slug == 'increase') {
            $increment_qty = $item->qty;
            $item->qty  = intval($increment_qty) + intval($qty);
        }
        if ($slug == 'decrease' && $item->qty > 1) {
            $decrement_qty = $item->qty;
            $item->qty  = intval($decrement_qty) -  intval($qty);
        }

        foreach ($carts as $key => $cart) {
            $cart = isset($cart->{$product_id}) ? $cart->{$product_id} : null;
            if ($cart) {
                unset($carts[$key]);
                $item_key = $key;
                break;
            }
        }
        // dd((array)$carts);
        $carts = $this->resetCarts($carts, $item, $item_key);

        // array_push($carts, array("{$product_id}" => $item));
        session()->put('carts', json_encode($carts));
        return response()->json(compact('carts'));
    }
    public function resetCarts($carts, $item, $item_key)
    {

        $new_carts = [];
        $item_assign = false;
        foreach ($carts as $key => $cart) {
            if (!array_key_exists($item_key, $carts) && !$item_assign) {
                $new_carts[$item_key] = array("{$item->product_id}" => $item);
                $item_assign = true;
                // dump($new_carts, 'from if');
            }
            if ($key == $item_key && !$item_assign) {
                $new_carts[$key] = array("{$item->product_id}" => $item);
                $new_carts[$item_key + 1] = $cart;
                $item_assign = true;
            } else {
                // array_push($new_carts, $cart);
                $new_carts[$key] = $cart;
            }
        }
        ksort($new_carts);
        // dd($new_carts);
        return $new_carts;
    }
    public function checkProductExist($carts, $product_id)
    {
        foreach ($carts as $key => $item) {
            $item = isset($item->{$product_id}) ? $item->{$product_id} : null;
            if ($item && $item->product_id == $product_id) {
                return true;
            }
        }
        return false;
    }

    public function removeProductFromCart($product_id)
    {
        $carts = $this->getCartsItems();
        if (!$this->checkProductExist($carts, $product_id)) {
            return response()->json(['error' => "Product Not Exist In Cart"], 404);
        }
        foreach ($carts as $key => $item) {
            $item = isset($item->{$product_id}) ? $item->{$product_id} : null;
            if ($item) {
                unset($carts[$key]);
                break;
            }
        }
        session()->put('carts', json_encode($carts));
        return response()->json(compact('carts'));
    }
    public function getItem($product_id)
    {
        $carts = $this->getCartsItems();
        foreach ($carts as $key => $item) {
            $item = isset($item->{$product_id}) ? $item->{$product_id} : null;
            // dd($item);

            if ($item && $item->product_id == $product_id) {
                return $item;
            }
        }
        return false;
    }
}
