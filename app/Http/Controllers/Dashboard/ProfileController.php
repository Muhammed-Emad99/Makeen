<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\ProfileRequest;
use App\Http\Requests\dashboard\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $user = Auth::user();
        return view('dashboard.profile', compact('user'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        $user = Auth::user();
        $user->update($request->all());

        return redirect()->back()->with('success', 'تم تعديل البيانات بنجاح');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {

        $user = Auth::user();
        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return redirect()->back()->with('success', 'تم تغيير كلمة السر بنجاح');
        } else {
            return redirect()->back()->with('error', 'كلمة المرور القديمة غير صحيحة')->withInput();
        }
    }
}
