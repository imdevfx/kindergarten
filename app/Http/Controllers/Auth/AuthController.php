<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|exists:users,login',
            'password' => 'required',
        ]);

        // 🔍 Foydalanuvchini topamiz
        $user = User::where('login', $request->login)->first();

        // 🔑 Parolni tekshiramiz
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return $this->errorResponse('Login yoki parolingiz xato!');
        }

        // 🪙 Token yaratamiz
        $token = $user->createToken('token-name')->plainTextToken;

        // ✅ Javob qaytaramiz
        return $this->successResponse([
            'token' => $token,
        ], new UserResource($user));
    }

    public function register(Request $request)
    {
        try {
            // ✅ 1. Validatsiya
            $validated = $request->validate([
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'phone' => 'required',
                'region_id' => 'required|exists:regions,id',
                'district_id' => 'required|exists:districts,id',
//                'neighborhood_id' => 'required|exists:neighborhoods,id',
                'neighborhood' => 'required',
                'company' => 'required',
//                'company_id' => 'required|exists:companies,id',
                'login' => 'required|unique:users,login',
                'password' => 'required|confirmed|min:6',
            ], [
                'firstname.required' => 'Ism kiritilishi shart.',
                'lastname.required' => 'Familiya kiritilishi shart.',
                'phone.required' => 'Telefon raqam kiritilishi shart.',

                'region_id.required' => 'Viloyat tanlanishi shart.',
                'region_id.exists' => 'Tanlangan viloyat mavjud emas.',

                'district_id.required' => 'Tuman (shahar) tanlanishi shart.',
                'district_id.exists' => 'Tanlangan tuman (shahar) mavjud emas.',

//                'neighborhood_id.required' => 'MFY tanlanishi shart.',
//                'neighborhood_id.exists' => 'Tanlangan MFY mavjud emas.',
//
//                'company_id.required' => 'Tashkilot tanlanishi shart.',
//                'company_id.exists' => 'Tanlangan tashkilot mavjud emas.',

                'neighborhood.required' => 'MFY kiritilishi shart.',
                'company.required' => 'Tashkilot kiritilishi shart.',

                'login.required' => 'Login kiritilishi shart.',
                'login.unique' => 'Bunday login tizimda mavjud.',

                'password.required' => 'Parol kiritilishi shart.',
                'password.confirmed' => 'Parol tasdiqlash mos kelmadi.',
                'password.min' => 'Parol kamida 6 ta belgidan iborat bo‘lishi kerak.',
            ]);

            // ✅ 2. Transaction bilan saqlash (ma’lumotlar xavfsizligi uchun)
            DB::beginTransaction();

            $user = User::create([
                'firstname' => $validated['firstname'],
                'lastname' => $validated['lastname'],
                'login' => $validated['login'],
                'password' => $validated['password'], // ⚠️ Parolni hashlash shart
            ]);

            $user->profile()->create([
                'region_id' => $validated['region_id'],
                'district_id' => $validated['district_id'],
                'neighborhood_id' => $validated['neighborhood_id'] ?? null,
                'company_id' => $validated['company_id'] ?? null,
                'neighborhood' => $validated['neighborhood'],
                'company' => $validated['company'],
                'phone' => $validated['phone'],
            ]);

            $user->assignRole('educator');

            DB::commit();

            return $this->successResponse('Siz muvaffaqiyatli ro‘yxatdan o‘tdingiz!', [
                'user' => $user->only(['id', 'firstname', 'lastname', 'login']),
            ]);

        } catch (ValidationException $e) {
            // ❌ Validatsiya xatoliklari
            return $this->errorResponse('Validatsiya xatoligi',$e->errors());

        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse('Serverda xatolik yuz berdi. Iltimos, qayta urinib ko‘ring.',config('app.debug') ? $e->getMessage() : null);
        }
    }
}
