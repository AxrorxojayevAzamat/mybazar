<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Entity\Shop\Mark;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Marks\CreateRequest;
use App\Http\Requests\Admin\Shop\Marks\UpdateRequest;
use App\Services\Manage\Shop\MarkService;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    private $service;

    public function __construct(MarkService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = Mark::orderByDesc('updated_at');

        if (!empty($value = $request->get('name'))) {
            $query->where(function ($query) use ($value) {
                $query->where('name_uz', 'ilike', '%' . $value . '%')
                    ->orWhere('name_ru', 'ilike', '%' . $value . '%')
                    ->orWhere('name_en', 'ilike', '%' . $value . '%');
            });
        }

        $marks = $query->paginate(20);

        return view('admin.shop.marks.index', compact('marks'));
    }

    public function create()
    {
        return view('admin.shop.marks.create');
    }

    public function store(CreateRequest $request)
    {
        $mark = $this->service->create($request);
        session()->flash('message', 'запись обновлён ');
        return redirect()->route('admin.shop.marks.show', $mark);
    }

    public function show(Mark $mark)
    {
        return view('admin.shop.marks.show', compact('mark'));
    }

    public function edit(Mark $mark)
    {
        return view('admin.shop.marks.edit', compact('mark'));
    }

    public function update(UpdateRequest $request, Mark $mark)
    {
        $mark = $this->service->update($mark->id, $request);
        session()->flash('message', 'запись обновлён ');
        return redirect()->route('admin.shop.marks.show', $mark);
    }

    public function destroy(Mark $mark)
    {
        $mark->delete();
        session()->flash('message', 'запись обновлён ');
        return redirect()->route('admin.shop.marks.index');
    }

    public function removeLogo(Mark $mark)
    {
        if ($this->service->removePhoto($mark->id)) {
            return response()->json('The logo is successfully deleted!');
        }
        return response()->json('The logo is not deleted!', 400);
    }
}
