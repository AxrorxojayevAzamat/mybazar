<?php


namespace App\Helpers;


use App\Entity\Shop\Category;
use App\Entity\Shop\Product;

class ProductHelper
{
    public static function getStatusList(): array
    {
        return [
            Product::STATUS_DRAFT => trans('adminlte.product.draft'),
            Product::STATUS_MODERATION => trans('adminlte.product.moderation'),
            Product::STATUS_ACTIVE => trans('adminlte.product.active'),
            Product::STATUS_CLOSED => trans('adminlte.product.closed'),
        ];
    }

    public static function getStatusLabel($status): string
    {
        switch ($status) {
            case Product::STATUS_DRAFT:
                return '<span class="badge badge-secondary">'. trans('adminlte.product.draft') . '</span>';
                break;
            case Product::STATUS_MODERATION:
                return '<span class="badge badge-warning">'. trans('adminlte.product.moderation') . '</span>';
                break;
            case Product::STATUS_ACTIVE:
                return '<span class="badge badge-success">'. trans('adminlte.product.active') . '</span>';
                break;
            case Product::STATUS_CLOSED:
                return '<span class="badge badge-danger">'. trans('adminlte.product.closed') . '</span>';
                break;
            default:
                return '<span class="badge badge-danger">Default</span>';
                break;
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
}
