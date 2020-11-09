<?php

namespace App\Services\Manage;

use Illuminate\Http\Request;
use App\Entity\Brand;
use App\Entity\Shop\CategoryBrand;
use App\Entity\Shop\CharacteristicCategory;
use App\Entity\Shop\Modification;
use App\Entity\Shop\Product;
use App\Entity\Store;
use App\Entity\StoreCategory;

class FilterService
{

    public function brandByCategoryId(array $categoryIds) {
        $brandIds = CategoryBrand::whereIn('category_id', $categoryIds)->get()->pluck('brand_id')->toArray();
        $brands   = Brand::whereIn('id', $brandIds)->get();
        return $brands;
    }

    public function storeByCategoryId(array $categoryIds) {
        $storeIds = StoreCategory::whereIn('category_id', $categoryIds)->get()->pluck('store_id')->toArray();
        $stores   = Store::whereIn('id', $storeIds)->get();
        return $stores;
    }

    public function groupModificationByCategoryId(array $categoryIds) {

        $groupModifications = null;

        $characteristicIds = CharacteristicCategory::whereIn('category_id', $categoryIds)
                        ->distinct()->get()->pluck('characteristic_id')->toArray();
        $modifications     = Modification::with(['characteristic'])->select(['shop_modifications.*', 'c.*'])
                        ->leftJoin('shop_characteristics as c', 'shop_modifications.characteristic_id', '=', 'c.id')
                        ->whereNotNull('shop_modifications.characteristic_id')
                        ->whereIn('c.id', $characteristicIds)->where('c.hide_in_filters', false)
                        ->orderBy('shop_modifications.characteristic_id')->orderBy('shop_modifications.value')->get();
        if ($modifications->isNotEmpty()) {
            $tempModifications = [];
            $modId             = $modifications[0]->characteristic_id;
            $i                 = 0;
            foreach ($modifications as $modification) {
                if ($modId === $modification->characteristic_id) {
                    $tempModifications[$i][] = $modification;
                } else {
                    $modId                     = $modification->characteristic_id;
                    $tempModifications[++$i][] = $modification;
                }
            }
            $groupModifications = $tempModifications;
            unset($tempModifications);
        }
        unset($modifications);

        return $groupModifications;
    }

    public function productById($productIds, Request $request) {
        $query = Product::with(['mainValues'])->where(['status' => Product::STATUS_ACTIVE])->whereIn('id', $productIds);
        
        return $this->productByQuery($query, $request);
    }

    public function productByCategoryId($categoryIds, Request $request) {
        $query = Product::with(['mainValues'])->where(['status' => Product::STATUS_ACTIVE])->whereIn('main_category_id', $categoryIds);
        
        return $this->productByQuery($query, $request);
    }

    private function productByQuery($query, Request $request) {


        if (!empty($value = $request->get('brands'))) {
            $value    = explode(',', $value);
            $brandIds = Brand::whereIn('slug', $value)->get()->pluck('id')->toArray();
            $query->whereIn('brand_id', $brandIds);
        }

        if (!empty($value = $request->get('stores'))) {
            $value    = explode(',', $value);
            $storeIds = Store::whereIn('slug', $value)->get()->pluck('id')->toArray();
            $query->whereIn('store_id', $storeIds);
        }

        if (!empty($value = $request->get('min_price'))) {
            $query->where('price_uzs', '>=', $value);
        }

        if (!empty($value = $request->get('max_price'))) {
            $query->where('price_uzs', '<=', $value);
        }

        if (!empty($values = $request->get('modification'))) {
            $productIds = [];
            foreach ($values as $i => $value) {
                $value      = explode(',', $value);
                $productIds = array_merge($productIds, Modification::where('characteristic_id', $i)->whereIn('value', $value)->get()->pluck('product_id')->toArray());
            }
            $productIds = array_unique($productIds);
            if (!empty($productIds)) {
                $query->whereIn('id', $productIds);
            }
        }
        $orderBy = $request->get('order_by');

        if (!empty($orderBy)) {
            if ($orderBy === 'price') {
                $query->orderBy('price_uzs');
            }
            if ($orderBy === 'rating') {
                $query->orderByDesc('rating');
            }
            if ($orderBy === 'date') {
                $query->orderByDesc('new');
            }
        }

        return $query;
    }

}
