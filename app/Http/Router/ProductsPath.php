<?php

namespace App\Http\Router;

use App\Entity\Category;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Support\Facades\Cache;

class ProductsPath implements UrlRoutable
{
    /**
     * @var Category
     */
    public $category;

    public function withCategory(?Category $category): self
    {
        $clone = clone $this;
        $clone->category = $category;
        return $clone;
    }

    public function getRouteKey()
    {
        $segments = [];

        if ($this->category) {
            $segments[] = Cache::tags(Category::class)->rememberForever('category_path_' . $this->category->id, function () {
                return $this->category->getPath();
            });
        }

        return implode('/', $segments);
    }

    public function getRouteKeyName(): string
    {
        return 'products_path';
    }

    public function resolveRouteBinding($value)
    {
        $chunks = explode('/', $value);

        /** @var Category|null $category */
        $category = null;
        do {
            $slug = reset($chunks);
            if ($slug && $next = Category::where('slug', $slug)->where('parent_id', $category ? $category->id : null)->first()) {
                $category = $next;
                array_shift($chunks);
            }
        } while (!empty($slug) && !empty($next));


        if (!empty($chunks)) {
            abort(404);
        }

        return $this->withCategory($category);
    }
}
