<?php

namespace App\Http\Controllers\Admin;


use App\Entity\Discount;
use App\Helpers\ImageHelper;
use App\Helpers\ProductHelper;
use App\Http\Requests\Admin\Discounts\CreateRequest;
use App\Http\Requests\Admin\Discounts\UpdateRequest;
use App\Services\Manage\DiscountService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DiscountController extends Controller
{
    private $service;

    public function __construct(DiscountService $service)
    {
        $this->middleware('can:manage-discounts');
        $this->service = $service;
    }

    public function index()
    {
        $discounts = Discount::paginate(10);

        return view('admin.discounts.index', compact('discounts'));
    }

    public function create()
    {
        $categories = ProductHelper::getCategoryList();
        $statuses = Discount::statusesList();

        return view('admin.discounts.create', compact('categories','statuses'));
    }


    public function store(CreateRequest $request)
    {
        $discount = $this->service->create($request);
        session()->flash('message', 'запись обновлён ');
        return redirect()->route('admin.discounts.show', $discount);
    }


    public function show(Discount $discount)
    {
        return view('admin.discounts.show', compact('discount'));
    }

    public function edit(Discount $discount)
    {
        $categories = ProductHelper::getCategoryList();
        $statuses = Discount::statusesList();
        return view('admin.discounts.edit', compact('discount', 'categories','statuses'));
    }

    public function update(UpdateRequest $request, Discount $discount)
    {
        $discount = $this->service->update($discount->id, $request);
        session()->flash('message', 'запись обновлён ');
        return redirect()->route('admin.blog.discounts.show', $discount);
    }

    public function destroy(Discount $discount)
    {
        if($discount->created_by != Auth::user()->id && !Auth::user()->isAdmin()) {
            return redirect()->route('admin.discounts.index');
        }

        Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_DISCOUNTS . '/' . $discount->id);

        $discount->delete();

        return redirect()->route('admin.discounts.index');
    }

    public function common(Discount $discount)
    {
        $discount->common();
        $discount->save();

        return redirect()->back();
    }

    public function rared(Discount $discount)
    {
        $discount->rared();
        $discount->save();

        return redirect()->back();
    }

    public function removeFile(Discount $discount)
    {
        if ($this->service->removePhoto($discount->id)) {
            return response()->json('The photo is successfully deleted!');
        }
        return response()->json('The photo is not deleted!', 400);
    }


}
