<?php

namespace App\Services\Manage\Shop;

use App\Entity\Shop\CharacteristicGroup;
use App\Http\Requests\Admin\Shop\CharacteristicGroups\CreateRequest;
use App\Http\Requests\Admin\Shop\CharacteristicGroups\UpdateRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CharacteristicGroupService
{
    public function create(CreateRequest $request): CharacteristicGroup
    {
        DB::beginTransaction();
        try {
            $group = CharacteristicGroup::create([
                'name_uz' => $request->name_uz,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'order' => $request->order,
            ]);

            $groups = CharacteristicGroup::orderBy('order')->get();
            $this->sort($groups);

            Db::commit();

            return $group;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(int $id, UpdateRequest $request): CharacteristicGroup
    {
        $group = CharacteristicGroup::findOrFail($id);

        DB::beginTransaction();
        try {
            $group->update([
                'name_uz' => $request->name_uz,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'order' => $request->order,
            ]);

            $groups = CharacteristicGroup::orderBy('order')->get();
            $this->sort($groups);

            DB::commit();

            return $group;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * @param Collection $groups
     * @throws \Throwable
     */
    private function sort($groups): void
    {
        foreach ($groups as $i => $group) {
            $group->setOrder($i + 1);
            $group->saveOrFail();
        }
    }

    public function first(int $id): void
    {
        $groups = CharacteristicGroup::orderBy('order')->get();

        foreach ($groups as $i => $group) {
            /* @var $group CharacteristicGroup */
            if ($group->isIdEqualTo($id)) {
                for ($j = $i; $j >= 0; $j--) {
                    if (!isset($groups[$j - 1])) {
                        break(1);
                    }

                    $prev = $groups[$j - 1];
                    $groups[$j - 1] = $groups[$j];
                    $groups[$j] = $prev;
                }

                DB::beginTransaction();
                try {
                    $this->sort($groups);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function up(int $id): void
    {
        $groups = CharacteristicGroup::orderBy('order')->get();

        foreach ($groups as $i => $group) {
            /* @var $group CharacteristicGroup */
            if ($group->isIdEqualTo($id)) {
                if (!isset($groups[$i - 1])) {
                    $count = count($groups);

                    for ($j = 1; $j < $count; $j++) {
                        $next = $groups[$j - 1];
                        $groups[$j - 1] = $groups[$j];
                        $groups[$j] = $next;
                    }
                } else {
                    $previous = $groups[$i - 1];
                    $groups[$i - 1] = $group;
                    $groups[$i] = $previous;
                }

                DB::beginTransaction();
                try {
                    $this->sort($groups);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function down(int $id): void
    {
        $groups = CharacteristicGroup::orderBy('order')->get();

        foreach ($groups as $i => $group) {
            /* @var $group CharacteristicGroup */
            if ($group->isIdEqualTo($id)) {
                if (!isset($groups[$i + 1])) {
                    $last = $groups->last();
                    $count = count($groups);

                    for ($j = $count - 1; $j > 0; $j--) {
                        $groups[$j] = $groups[$j - 1];
                    }

                    $groups[$j] = $last;
                } else {
                    $next = $groups[$i + 1];
                    $groups[$i + 1] = $group;
                    $groups[$i] = $next;
                }

                DB::beginTransaction();
                try {
                    $this->sort($groups);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function last(int $id): void
    {
        $groups = CharacteristicGroup::orderBy('order')->get();

        foreach ($groups as $i => $group) {
            /* @var $group CharacteristicGroup */
            if ($group->isIdEqualTo($id)) {
                $count = count($groups);
                for ($j = $i; $j < $count; $j++) {
                    if (!isset($groups[$j + 1])) {
                        break(1);
                    }

                    $next = $groups[$j + 1];
                    $groups[$j + 1] = $groups[$j];
                    $groups[$j] = $next;
                }

                DB::beginTransaction();
                try {
                    $this->sort($groups);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }
}
