<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Service;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // عرض الصفحة الرئيسية للوحة التحكم
    public function index()
    {
        $userCount = User::count(); // عدد المستخدمين
        $serviceCount = Service::count(); // عدد الخدمات
        $chatCount = Chat::count(); // عدد المحادثات

        return view('admin.dashboard.index', compact('userCount', 'serviceCount', 'chatCount'));
    }

   
    // عرض قائمة المستخدمين
    public function users()
    {
        $users = User::all();
        return view('admin.dashboard.users', compact('users'));
    }

     public function userStatistics($id)
    {
        // استرداد المستخدم بناءً على المعرف
        $user = User::findOrFail($id);
        
        // يمكنك جمع الإحصائيات هنا
        $totalOrders = $user->orders()->count(); // مثال على استرداد عدد الطلبات

        return view('admin.users.statistics', compact('user', 'totalOrders'));
    }

    // عرض قائمة الخدمات
    // عرض قائمة الخدمات
    public function services()
    {
        $services = Service::all(); // الحصول على جميع الخدمات
        return view('admin.dashboard.services', compact('services'));
    }

    public function createService()
    {
        return view('admin.dashboard.services.create'); // عرض نموذج إضافة خدمة جديدة
    }

    public function destroyService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.dashboard.services')->with('success', 'تم حذف الخدمة بنجاح.');
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Service::create($request->all()); // إضافة الخدمة الجديدة

        return redirect()->route('admin.dashboard.services')->with('success', 'تم إضافة الخدمة بنجاح.');
    }

    public function updateService(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $service = Service::findOrFail($id);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->save();

        return redirect()->route('admin.dashboard.services.index')->with('success', 'تم تحديث الخدمة بنجاح');
    }


    // عرض قائمة المحادثات
    public function chats()
    {
        $chats = Chat::all();
        return view('admin.dashboard.chats', compact('chats'));
    }

    // عرض صفحة تحرير الخدمة
    public function editService($id)
    {
        $service = Service::findOrFail($id); // الحصول على الخدمة حسب معرفها
        return view('admin.dashboard.services.edit', compact('service')); // توجيه المستخدم إلى صفحة تحرير الخدمة
    }
}
