<?php

namespace App\Http\Controllers\Api\Shop;

use App\Entity\Shop\Characteristic;
use App\Http\Controllers\Controller;
use App\Http\Resources\Shop\CharacteristicsResource;
use Illuminate\Http\Request;

class CharacteristicController extends Controller
{
    public function show(Characteristic $characteristic)
    {
        return new CharacteristicsResource($characteristic);
    }
}
