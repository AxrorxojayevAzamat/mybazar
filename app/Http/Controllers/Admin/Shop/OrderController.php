<?php


namespace App\Http\Controllers\Admin\Shop;


use App\Entity\Shop\Order;
use App\Entity\Shop\OrderItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::orderByDesc('updated_at');

        if ($request->has('date_from') && !empty($request->date_from)) {
            $query->where('created_at', '>=', $request->date_from . ' 00:00:00');
        }

        if ($request->has('date_to') && !empty($request->date_to)) {
            $query->where('created_at', '<=', $request->date_to . ' 23:59:59');
        }

        $orders = $query->paginate(20);

        return view('admin.shop.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.shop.orders.show', compact('order'));
    }

    public function showItem(Order $order, OrderItem $item)
    {
        return view('admin.shop.orders.item', compact('order', 'item'));
    }
}
