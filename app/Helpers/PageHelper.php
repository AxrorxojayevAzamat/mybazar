<?php


namespace App\Helpers;


use App\Entity\Page;

class PageHelper
{
    public static function getPageList(): array
    {
        /* @var $page Page */
        $pages = Page::defaultOrder()->withDepth()->get();
        $pageIds = [];
        foreach ($pages as $page) {
            $name = '';
            for ($i = 0; $i < $page->depth; $i++) {
                $name .= '— ';
            }
            $pageIds[$page->id] = $name . $page->title;
        }
        return $pageIds;
    }
}
