<?php

namespace App\Http\Controllers\Admin;

use App\Entity\DeliveryMethod;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeliveryMethods\CreateRequest;
use App\Http\Requests\Admin\DeliveryMethods\UpdateRequest;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage-deliveries');
    }

    public function index(Request $request)
    {
        $query = DeliveryMethod::orderByDesc('updated_at');

        if (!empty($value = $request->get('name'))) {
            $query->where(function ($query) use ($value) {
                $query->where('name_uz', 'ilike', '%' . $value . '%')
                    ->orWhere('name_ru', 'ilike', '%' . $value . '%')
                    ->orWhere('name_en', 'ilike', '%' . $value . '%');
            });
        }

        $deliveries = $query->paginate(20);

        return view('admin.delivery_methods.index', compact('deliveries'));
    }

    public function create()
    {
        return view('admin.delivery_methods.create');
    }

    public function store(CreateRequest $request)
    {
        $delivery = DeliveryMethod::create([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'cost' => $request->cost,
            'min_weight' => $request->min_weight,
            'max_weight' => $request->max_weight,
        ]);
        session()->flash('message', 'запись обновлён ');
//        session()->flash('error', 'Произошла ошибка');
        return redirect()->route('admin.deliveries.show', $delivery);
    }

    public function show(DeliveryMethod $delivery)
    {
        return view('admin.delivery_methods.show', compact('delivery'));
    }

    public function edit(DeliveryMethod $delivery)
    {
        return view('admin.delivery_methods.edit', compact('delivery'));
    }

    public function update(UpdateRequest $request, DeliveryMethod $delivery)
    {
        $delivery->update([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'cost' => $request->cost,
            'min_weight' => $request->min_weight,
            'max_weight' => $request->max_weight,
        ]);

        return redirect()->route('admin.deliveries.show', $delivery);
    }

    public function destroy(DeliveryMethod $delivery)
    {
        $delivery->delete();

        return redirect()->route('admin.deliveries.index');
    }
}
