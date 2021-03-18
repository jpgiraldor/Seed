<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function index()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Store products";
        $data["products"] = Product::all();

        return view('shopping.index')->with("data",$data);
    }

    public function cart(Request $request){
        $data = []; //to be sent to the view
        $data["title"] = "Store products";

        $listProductsInCart = array();
        $total = 0;
        $ids = $request->session()->get("products"); 
        if($ids){
            $listProductsInCart = Product::findMany($ids);
            foreach ($listProductsInCart as $product) {
                $total = $total + $product->getPrice();
            }
        }
        $data["total"] = $total;
        $data["products"] = $listProductsInCart;

        return view('shopping.cart')->with("data",$data);
    }

    public function add($id, Request $request)
    {
        $products = $request->session()->get("products");
        $products[$id] = $id;
        $request->session()->put('products', $products);
        return back();
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('products');
        return back();
    }

    public function buy(Request $request)
    {
        $data = []; //to be sent to the view
        $data["title"] = "Buy";
        $order = new Order();
        $order->setTotal(0);
        $order->save();
        
        $total = 0;
        $ids = $request->session()->get("products"); 
        if($ids){
            $listProductsInCart = Product::findMany($ids);
            foreach ($listProductsInCart as $product) {
                $item = new Item();
                $item->setQuantity(1);
                $item->setSubTotal($product->getPrice());
                $item->setProductId($product->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total = $total + $product->getPrice();
            }
        }

        $order->setTotal($total);
        $order->save();

        return view('shopping.buy')->with("data",$data);
    }
}
