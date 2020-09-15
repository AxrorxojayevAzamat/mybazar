<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Brand;

class BrandsController extends Controller
{

    public function brands(Request $request)
    {

        $brands = Brand::orderBy('name_ru', 'asc');
        
        if (!empty($value = $request->get('brand-latin'))) {
            $brands->where(function ($query) use ($value) {
                $query->whereRaw("LEFT(name_uz, 1) = ?", $value)
                        ->orWhereRaw("LEFT(name_en, 1) = ?", $value);
            });
        }

        if (!empty($value = $request->get('brand-cyrill'))) {
            $brands->where(function ($query) use ($value) {
                $query->whereRaw("LEFT(name_ru, 1) = ?", $value);
            });
        }

        $groups = $brands->get()->reduce(function ($carry, $brand) {

            $first_letter = $brand['name_ru'][0];

            if (!isset($carry[$first_letter])) {
                $carry[$first_letter] = [];
            }

            $carry[$first_letter][] = $brand;

            return $carry;
        }, []);
        
        return view('brand.brands', compact('groups'));
    }

}
