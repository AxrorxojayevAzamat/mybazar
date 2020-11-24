<?php


namespace App\Http\Controllers\Admin\Shop;


use App\Entity\Shop\Cart;
use App\Entity\Shop\OrderItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $query = Cart::orderByDesc('updated_at');

        if ($request->has('date_from') && !empty($request->date_from)) {
            $query->where('created_at', '>=', $request->date_from . ' 00:00:00');
        }

        if ($request->has('date_to') && !empty($request->date_to)) {
            $query->where('created_at', '<=', $request->date_to . ' 23:59:59');
        }

        $carts = $query->paginate(20);

        return view('admin.shop.carts.index', compact('carts'));
    }

    public function show(Cart $cart)
    {
        return view('admin.shop.carts.show', compact('cart'));
    }
}
