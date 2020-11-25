<?php


namespace App\Helpers;


use App\Entity\Category;
use App\Entity\Discount;
use App\Entity\Shop\Product;
use App\Entity\Shop\ShopDiscounts;

class ProductHelper
{
    public static function getStatusList(): array
    {
        return [
            Product::STATUS_DRAFT => trans('adminlte.draft'),
            Product::STATUS_MODERATION => trans('adminlte.product.moderation'),
            Product::STATUS_ACTIVE => trans('adminlte.product.active'),
            Product::STATUS_CLOSED => trans('adminlte.product.closed'),
            Product::STATUS_DRAFT_CATEGORY_SPLITTED => trans('adminlte.category_splitted'),
        ];
    }

    public static function getStatusLabel($status): string
    {
        switch ($status) {
            case Product::STATUS_DRAFT:
                return '<span class="badge badge-secondary">' . trans('adminlte.draft') . '</span>';
            case Product::STATUS_MODERATION:
                return '<span class="badge badge-warning">' . trans('adminlte.product.moderation') . '</span>';
            case Product::STATUS_ACTIVE:
                return '<span class="badge badge-success">' . trans('adminlte.product.active') . '</span>';
            case Product::STATUS_CLOSED:
                return '<span class="badge badge-danger">' . trans('adminlte.product.closed') . '</span>';
            case Product::STATUS_DRAFT_CATEGORY_SPLITTED:
                return '<span class="badge badge-danger">' . trans('adminlte.category_splitted') . '</span>';
            default:
                return '<span class="badge badge-danger">Default</span>';
        }
    }

    public static function getCategoryList(): array
    {
        /* @var $category Category */
        $categories = Category::defaultOrder()->withDepth()->get();
        $categoryIds = [];
        foreach ($categories as $category) {
            $name = '';
            for ($i = 0; $i < $category->depth; $i++) {
                $name .= '— ';
            }
            $categoryIds[$category->id] = $name . $category->name;
        }
        return $categoryIds;
    }

    public static function getDiscounts($value)
    {
        $discountStore = ShopDiscounts::where(['store_id' => $value])->pluck('discount_id');
        return Discount::whereIn('id', $discountStore)->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id')->toArray();
    }
}
