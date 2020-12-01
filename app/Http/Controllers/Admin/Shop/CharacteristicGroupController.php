<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Entity\Shop\CharacteristicGroup;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\CharacteristicGroups\CreateRequest;
use App\Http\Requests\Admin\Shop\CharacteristicGroups\UpdateRequest;
use App\Services\Manage\Shop\CharacteristicGroupService;
use Illuminate\Http\Request;

class CharacteristicGroupController extends Controller
{
    private $service;

    public function __construct(CharacteristicGroupService $service)
    {
        $this->middleware('can:manage-shop-characteristics');
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = CharacteristicGroup::orderBy('order');

        if (!empty($value = $request->get('name'))) {
            $query->where(function ($query) use ($value) {
                $query->where('name_uz', 'ilike', '%' . $value . '%')
                    ->orWhere('name_ru', 'ilike', '%' . $value . '%')
                    ->orWhere('name_en', 'ilike', '%' . $value . '%');
            });
        }

        $groups = $query->paginate(20);

        return view('admin.shop.characteristic_groups.index', compact('groups'));
    }

    public function create()
    {
        return view('admin.shop.characteristic_groups.create');
    }

    public function store(CreateRequest $request)
    {
        $group = $this->service->create($request);
        session()->flash('message', 'запись обновлён ');
        return redirect()->route('admin.shop.characteristic-groups.show', $group);
    }

    public function show(CharacteristicGroup $characteristicGroup)
    {
        return view('admin.shop.characteristic_groups.show', ['group' => $characteristicGroup]);
    }

    public function edit(CharacteristicGroup $characteristicGroup)
    {
        return view('admin.shop.characteristic_groups.edit', ['group' => $characteristicGroup]);
    }

    public function update(UpdateRequest $request, CharacteristicGroup $characteristicGroup)
    {
        $this->service->update($characteristicGroup->id, $request);
        session()->flash('message', 'запись обновлён ');
        return redirect()->route('admin.shop.characteristic-groups.show', $characteristicGroup);
    }

    public function destroy(CharacteristicGroup $characteristicGroup)
    {
        $characteristicGroup->delete();
        session()->flash('message', 'запись обновлён ');
//        session()->flash('error', 'Произошла ошибка');
        return redirect()->route('admin.shop.characteristic-groups.index');
    }

    public function first(CharacteristicGroup $group)
    {
        try {
            $this->service->first($group->id);
            return redirect()->route('admin.shop.characteristic-groups.index');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function up(CharacteristicGroup $group)
    {
        try {
            $this->service->up($group->id);
            return redirect()->route('admin.shop.characteristic-groups.index');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function down(CharacteristicGroup $group)
    {
        try {
            $this->service->down($group->id);
            return redirect()->route('admin.shop.characteristic-groups.index');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function last(CharacteristicGroup $group)
    {
        try {
            $this->service->last($group->id);
            return redirect()->route('admin.shop.characteristic-groups.index');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
