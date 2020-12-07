<?php

namespace App\Services\Manage;

use App\Entity\Category;
use App\Entity\UserFavorite;
use App\Helpers\LanguageHelper;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use App\Entity\Brand;
use App\Entity\Shop\CategoryBrand;
use App\Entity\Shop\CharacteristicCategory;
use App\Entity\Shop\Modification;
use App\Entity\Shop\Product;
use App\Entity\Store;
use Illuminate\Support\Facades\Auth;


class FilterService
{
    public function groupModificationByCategoryId(array $categoryIds): array
    {
        $groupModifications = null;

        $characteristicIds = CharacteristicCategory::whereIn('category_id', $categoryIds)
            ->distinct()->get()->pluck('characteristic_id')->toArray();
        $modifications = Modification::with(['characteristic'])->select(['shop_modifications.*', 'c.*'])
            ->leftJoin('shop_characteristics as c', 'shop_modifications.characteristic_id', '=', 'c.id')
            ->whereNotNull('shop_modifications.characteristic_id')
            ->whereIn('c.id', $characteristicIds)->where('c.hide_in_filters', false)
            ->orderBy('shop_modifications.characteristic_id')->orderBy('shop_modifications.value')->get();
        if ($modifications->isNotEmpty()) {
            $tempModifications = [];
            $modId = $modifications[0]->characteristic_id;
            $i = 0;
            foreach ($modifications as $modification) {
                if ($modId === $modification->characteristic_id) {
                    $tempModifications[$i][] = $modification;
                } else {
                    $modId = $modification->characteristic_id;
                    $tempModifications[++$i][] = $modification;
                }
            }
            $groupModifications = $tempModifications;
            unset($tempModifications);
            unset($modifications);
            return $groupModifications;
        }
        return ['data' => false];

    }

    public  function categorysList(array $categoryIds){
        $model = Category::whereIn('id',$categoryIds)->get();
        return $model;
    }

    public function productById(array $productIds, Request $request)
    {
      $model = Product::whereIn('id',$productIds);
        if (!empty($request->get('categoryId'))) {
            $model->where(['main_category_id' => $request->get('categoryId')]);
            return $model;
        }

        if (!empty($request->get('order'))) {
            if ($request->get('order') === 'name'){
                $model->orderBy('name_' . LanguageHelper::getCurrentLanguagePrefix());
                return $model;
            }
        }

      return $model;
    }

    public function productByCategoryId($categoryIds, Request $request): Builder
    {
        $query = Product::with(['mainValues'])->where(['status' => Product::STATUS_ACTIVE])->whereIn('main_category_id', $categoryIds);

        return $this->productByQuery($query, $request);
    }

    private function productByQuery($query, Request $request)
    {
        if (!empty($value = $request->get('brands'))) {
            $value = explode(',', $value);
            $brandIds = Brand::whereIn('slug', $value)->get()->pluck('id')->toArray();
            $query->whereIn('brand_id', $brandIds);
        }

        if (!empty($value = $request->get('stores'))) {
            $value = explode(',', $value);
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
                $value = explode(',', $value);
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
