<?php


namespace App\Services\Manage\Shop;


use App\Entity\Shop\Characteristic;
use App\Http\Requests\Admin\Shop\Characteristics\CreateRequest;
use App\Http\Requests\Admin\Shop\Characteristics\UpdateRequest;
use Illuminate\Support\Facades\DB;

class CharacteristicService
{
    public function create(CreateRequest $request): Characteristic
    {
        DB::beginTransaction();
        try {
            $characteristic = Characteristic::create([
                'name_uz' => $request->name_uz,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'type' => $request->type,
                'required' => $request->required,
                'default' => $request->variants ? $request->default : null,
                'variants' => array_map('trim', preg_split('#[\r\n]+#', $request['variants'])),
            ]);

            $this->addCategories($characteristic, $request->categories);

            Db::commit();

            return $characteristic;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(int $id, UpdateRequest $request): Characteristic
    {
        $characteristic = Characteristic::findOrFail($id);

        DB::beginTransaction();
        try {
            $characteristic->update([
                'name_uz' => $request->name_uz,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'type' => $request->type,
                'required' => $request->required,
                'default' => $request->variants ? $request->default : null,
                'variants' => array_map('trim', preg_split('#[\r\n]+#', $request['variants'])),
            ]);

            $characteristic->characteristicCategories()->delete();
            $this->addCategories($characteristic, $request->categories);

            DB::commit();

            return $characteristic;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    private function addCategories(Characteristic $characteristic, array $categories)
    {
        $categories = array_unique($categories);
        foreach ($categories as $i => $categoryId) {
            $characteristic->characteristicCategories()->create(['category_id' => $categoryId]);
        }
    }
}
