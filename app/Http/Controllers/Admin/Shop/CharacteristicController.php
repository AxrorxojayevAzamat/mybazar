<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Entity\Shop\CharacteristicCategory;
use App\Entity\Shop\Characteristic;
use App\Entity\Shop\CharacteristicGroup;
use App\Helpers\LanguageHelper;
use App\Helpers\ProductHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Characteristics\CreateRequest;
use App\Http\Requests\Admin\Shop\Characteristics\UpdateRequest;
use App\Services\Manage\Shop\CharacteristicService;
use Illuminate\Http\Request;

class CharacteristicController extends Controller
{
    private $service;

    public function __construct(CharacteristicService $service)
    {
        $this->middleware('can:manage-shop-characteristics');
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = Characteristic::orderByDesc('updated_at');

        if (!empty($value = $request->get('name'))) {
            $query->where(function ($query) use ($value) {
                $query->where('name_uz', 'ilike', '%' . $value . '%')
                    ->orWhere('name_ru', 'ilike', '%' . $value . '%')
                    ->orWhere('name_en', 'ilike', '%' . $value . '%');
            });
        }

        if (!empty($value = $request->get('category_id'))) {
            $characteristics = CharacteristicCategory::where('category_id', $value)->pluck('characteristic_id')->toArray();
            $query->whereIn('id', $characteristics);
        }

        $characteristics = $query->paginate(20);

        $categories = ProductHelper::getCategoryList();
        $groups = CharacteristicGroup::orderByDesc('updated_by')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.shop.characteristics.index', compact('characteristics', 'categories', 'groups'));
    }

    public function create()
    {
        $categories = ProductHelper::getCategoryList();
        $types = Characteristic::typesList();
        $groups = CharacteristicGroup::orderByDesc('updated_by')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.shop.characteristics.create', compact('categories', 'types', 'groups'));
    }

    public function store(CreateRequest $request)
    {

        $characteristic = $this->service->create($request);

        return redirect()->route('admin.shop.characteristics.show', $characteristic);
    }

    public function show(Characteristic $characteristic)
    {
        return view('admin.shop.characteristics.show', compact('characteristic'));
    }

    public function edit(Characteristic $characteristic)
    {
        $categories = ProductHelper::getCategoryList();
        $types = Characteristic::typesList();
        $groups = CharacteristicGroup::orderByDesc('updated_by')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.shop.characteristics.edit', compact('characteristic', 'categories', 'types', 'groups'));
    }

    public function update(UpdateRequest $request, Characteristic $characteristic)
    {
        $this->service->update($characteristic->id, $request);

        return redirect()->route('admin.shop.characteristics.show', $characteristic);
    }

    public function moderate(Characteristic $characteristic)
    {
        try {
            $this->service->moderate($characteristic->id);

            return redirect()->route('admin.shop.characteristics.show', $characteristic);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function draft(Characteristic $characteristic)
    {
        try {
            $this->service->draft($characteristic->id);

            return redirect()->route('admin.shop.characteristics.show', $characteristic);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Characteristic $characteristic)
    {
        $characteristic->delete();

        return redirect()->route('admin.shop.characteristics.index');
    }
}
