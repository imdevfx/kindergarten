<?php

namespace App\Http\Controllers\Regions;

use App\Http\Controllers\Controller;
use App\Http\Resources\Regions\RegionResource;
use App\Http\Resources\Regions\RegionWithoutRelationResource;
use App\Models\Company;
use App\Models\District;
use App\Models\Neighborhood;
use App\Models\Region;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::query()
            ->orderByDesc('created_at')
            ->paginate(\request()->query('pagination', 20));

        return RegionResource::collection($regions);
    }

    public function getAll()
    {
        $regions = Region::query()
            ->get()
            ->sortBy('name');

        return RegionResource::collection($regions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ✅ VALIDATION
        // ✅ VALIDATION
        $validator = Validator::make($request->all(), [
            'regions' => ['required', 'array'],
            'regions.*.name' => ['required', 'string'],

            // Districts
            'regions.*.districts' => ['nullable', 'array'],
            'regions.*.districts.*.name' => ['required_with:regions.*.districts', 'string'],

            // Neighborhoods (MFY)
            'regions.*.districts.*.neighborhoods' => ['nullable', 'array'],
            'regions.*.districts.*.neighborhoods.*.name' => ['required_with:regions.*.districts.*.neighborhoods', 'string'],

            // Companies
            'regions.*.districts.*.neighborhoods.*.companies' => ['nullable', 'array'],
            'regions.*.districts.*.neighborhoods.*.companies.*' => ['nullable', 'string'],
        ], [
            // Xabarlar
            'regions.required' => 'Viloyatlar ro‘yxati kiritilishi shart.',
            'regions.array' => 'Viloyatlar ro‘yxati noto‘g‘ri formatda yuborilgan.',
            'regions.*.name.required' => 'Har bir viloyat nomi kiritilishi shart.',
            'regions.*.districts.*.name.required_with' => 'Har bir tuman nomi kiritilishi shart.',
            'regions.*.districts.*.neighborhoods.*.name.required_with' => 'Har bir MFY nomi kiritilishi shart.',
        ]);

        // ❌ Agar validatsiyada xatolik bo‘lsa — shu yerda qaytadi
        if ($validator->fails()) {
            return $this->errorResponse('Validatsiya xatoligi',$validator->errors());
        }

        try {
            foreach ($request->regions as $regionData) {

                // 1️⃣ REGION — mavjud bo‘lsa topadi, yo‘q bo‘lsa yaratadi
                $region = Region::firstOrCreate(['name' => $regionData['name']]);

                // 2️⃣ DISTRICTS
                if (!empty($regionData['districts'])) {
                    foreach ($regionData['districts'] as $districtData) {
                        $district = District::firstOrCreate([
                            'region_id' => $region->id,
                            'name' => $districtData['name'],
                        ]);

                        // 3️⃣ NEIGHBORHOODS (MFY)
                        if (!empty($districtData['neighborhoods'])) {
                            foreach ($districtData['neighborhoods'] as $neighborhoodData) {
                                $neighborhood = Neighborhood::firstOrCreate([
                                    'district_id' => $district->id,
                                    'name' => $neighborhoodData['name'],
                                ]);

                                // 4️⃣ COMPANIES
                                if (!empty($neighborhoodData['companies'])) {
                                    foreach ($neighborhoodData['companies'] as $companyName) {
                                        Company::firstOrCreate([
                                            'neighborhood_id' => $neighborhood->id,
                                            'name' => $companyName,
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                }
            }

            return $this->successResponse('Ma\'lumotlar muvaffaqiyatli saqlandi.', new RegionResource($region));
        } catch (Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|int',
            'type' => 'required|in:regions,districts,neighborhoods,companies',
            'name' => [
                'required',
                Rule::unique($request->type, 'name')->ignore($request->id),
            ],
        ], [
            'id.required' => 'ID kiritilishi shart!',
            'id.integer' => 'ID son ko‘rinishida bo‘lishi kerak!',
            'type.required' => 'Tur (type) maydoni kiritilishi shart!',
            'type.in' => 'Noto‘g‘ri tur kiritildi. Faqat regions, districts, neighborhoods yoki companies bo‘lishi mumkin.',
            'name.required' => 'Nom maydoni to‘ldirilishi shart!',
            'name.unique' => 'Ushbu nom oldin kiritilgan!',
        ]);

        try {
            // 🔹 modelni tanlash
            $model = match ($data['type']) {
                'regions' => Region::find($data['id']),
                'districts' => District::find($data['id']),
                'neighborhoods' => Neighborhood::find($data['id']),
                'companies' => Company::find($data['id']),
            };

            $model->update([
                'name' => $request->name
            ]);

            return $this->successResponse('Ma\'lumot muvaffaqiyatli tahrirlandi!', $model);
        } catch (Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|integer',
            'type' => 'required|in:regions,districts,neighborhoods,companies',
        ], [
            'id.required' => 'ID kiritilishi shart!',
            'id.integer' => 'ID raqam ko‘rinishida bo‘lishi kerak!',
            'type.required' => 'Tur (type) maydoni kiritilishi shart!',
            'type.in' => 'Noto‘g‘ri tur kiritildi. Faqat regions, districts, neighborhoods yoki companies bo‘lishi mumkin.',
        ]);

        try {
            // 🔹 Modelni aniqlash
            $model = match ($data['type']) {
                'regions' => Region::find($data['id']),
                'districts' => District::find($data['id']),
                'neighborhoods' => Neighborhood::find($data['id']),
                'companies' => Company::find($data['id']),
            };

            // 🔹 Model mavjudligini tekshirish
            if (!$model) {
                return $this->errorResponse('Ma’lumot topilmadi!');
            }

            // 🔹 O‘chirish (agar modelda cascadeOnDelete bo‘lsa, farzandlari ham o‘chadi)
            $model->delete();

            return $this->successResponse(
                ucfirst(rtrim($data['type'], 's')) . ' muvaffaqiyatli o‘chirildi!'
            );
        } catch (Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }
}
