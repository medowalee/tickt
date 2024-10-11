<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // عرض صفحة تسجيل الدخول
    public function showLoginForm()
    {
        return view('auth.login'); // عرض نموذج تسجيل الدخول
    }

    // تسجيل الدخول
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/'); // توجيه المستخدم بعد تسجيل الدخول
        }

        return back()->withErrors(['email' => 'بيانات الاعتماد غير صحيحة.']);
    }

    // عرض صفحة التسجيل
    public function showRegistrationForm()
    {
        return view('auth.register'); // عرض نموذج التسجيل
    }

    // تسجيل مستخدم جديد
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // تسجيل الدخول تلقائيًا بعد التسجيل

        return redirect()->intended('/'); // توجيه المستخدم بعد التسجيل
    }

    // تسجيل الخروج
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/'); // توجيه المستخدم بعد تسجيل الخروج
    }

    // عرض صفحة الملف الشخصي
    public function showProfile()
{
    return view('user.profile'); // تأكد من أن هذا الاسم يتطابق مع اسم الملف الذي أنشأته
}


    // تحديث الملف الشخصي
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return back()->with('success', 'تم تحديث الملف الشخصي بنجاح.'); // رسالة نجاح
    }
}
