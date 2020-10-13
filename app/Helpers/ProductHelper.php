<?php


namespace App\Helpers;


use App\Entity\Category;
use App\Entity\Shop\Product;

class ProductHelper
{
    public static function getStatusList(): array
    {
        return [
            Product::STATUS_DRAFT => trans('adminlte.draft'),
            Product::STATUS_MODERATION => trans('adminlte.product.moderation'),
            Product::STATUS_ACTIVE => trans('adminlte.product.active'),
            Product::STATUS_CLOSED => trans('adminlte.product.closed'),
            Product::STATUS_NO_PRODUCT => trans('adminlte.product.no_product_left'),
            Product::STATUS_DRAFT_CATEGORY_SPLITTED => trans('adminlte.category_splitted'),
        ];
    }

    public static function getStatusLabel($status): string
    {
        switch ($status) {
            case Product::STATUS_DRAFT:
                return '<span class="badge badge-secondary">'. trans('adminlte.draft') . '</span>';
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
            case Product::STATUS_NO_PRODUCT:
                return '<span class="badge badge-dark">'. trans('adminlte.product.no_product_left') . '</span>';
                break;
            case Product::STATUS_DRAFT_CATEGORY_SPLITTED:
                return '<span class="badge badge-danger">'. trans('adminlte.category_splitted') . '</span>';
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
