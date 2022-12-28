<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Store;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $categories = Category::orderby('created_at' , 'DESC')->get();
        $stores = Store::orderby('created_at' , 'DESC')->get();
        $productCart = Cart::withTrashed()->orderby('created_at' , 'DESC')->get();
        $productCartreport = DB::select("select product_id ,  sum(price) as total from carts group by product_id order by total desc");

        return view('Cart.index')
        ->with('productCartreport', $productCartreport)
        ->with('productCart', $productCart)
        ->with('stores', $stores)
        ->with('categories', $categories);
    }

}
