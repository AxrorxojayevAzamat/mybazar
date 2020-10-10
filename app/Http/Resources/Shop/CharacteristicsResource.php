<?php

namespace App\Http\Resources\Shop;

use App\Entity\Category;
use App\Entity\Shop\Characteristic;
use App\Entity\Shop\CharacteristicCategory;
use App\Helpers\LanguageHelper;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $type
 * @property string $default
 * @property boolean $required
 * @property array $variants
 *
 * @property CharacteristicCategory[] $characteristicCategories
 * @property Category[] $categories
 */
class CharacteristicsResource extends JsonResource
{
    /**
     * @param Characteristic $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => LanguageHelper::getName($this),
            'type' => $this->type,
            'default' => $this->default,
            'required' => $this->required,
            'variants' => $this->variants,
        ];
    }
}
