<?php

namespace App\Http\Controllers\Regions;

use App\Http\Controllers\Controller;
use App\Http\Resources\Regions\DistrictResource;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function getAll($region_id)
    {
        $districts = District::query()
            ->where('region_id',$region_id)
            ->get()
            ->sortBy('name');

        return DistrictResource::collection($districts);
    }
}
