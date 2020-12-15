<?php


namespace App\Http\Controllers\Admin;

use App\Entity\Banner;
use App\Http\Controllers\Controller;
use App\Entity\Store;
use App\Entity\Category;
use App\Entity\Brand;
use App\Entity\Shop\Order;
use App\Entity\Shop\Product;
use App\Entity\User\User;

class HomeController extends Controller
{
    
    public function index()
    {
        $storesCount = Store::count();
        $brandCount = Brand::count();
        $categoryCount = Category::count();
        $productsCount = Product::count();
        $managerCount = User::where('role', 'manager')->count();
        $userCount = User::where('role', 'user')->count();
        $bannerCount = Banner::count();
        $orderCount = Order::count();
        return view('admin.home',
            compact('storesCount', 'brandCount', 'categoryCount', 'productsCount', 'managerCount', 'userCount', 'bannerCount', 'orderCount'));
    }
}
