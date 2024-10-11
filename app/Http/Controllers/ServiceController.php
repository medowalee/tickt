<?php

namespace App\Http\Controllers;
use App\Models\Order;


use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ServiceController extends Controller
{
    // عرض قائمة الخدمات
    public function index()
    {
        $services = Service::all(); // جلب جميع الخدمات
        return view('services.index', compact('services')); // تمرير المتغير إلى العرض
    }

    // عرض خدمة معينة
    public function show($id)
    {
        $service = Service::findOrFail($id); // جلب الخدمة من قاعدة البيانات
        return view('services.show', compact('service')); // تمرير الخدمة إلى العرض
    }

    public function purchase($id)
    {
        $service = Service::findOrFail($id);

        // قم بإنشاء طلب جديد في قاعدة البيانات
        $order = new Order();
        $order->user_id = Auth::id();
        $order->service_id = $service->id;
        $order->price = $service->price;
        $order->status = 'pending'; // حالة الطلب في البداية "معلق"
        $order->save();

        return redirect()->route('services.purchase')->with('success', 'تم شراء الخدمة بنجاح! سيتم التواصل معك قريباً.');
    }

    public function buy(Request $request)
{
    $request->validate([
        'service_id' => 'required|exists:services,id',
    ]);

    // قم بإنشاء الطلب بناءً على الخدمة المحددة
    $service = Service::find($request->service_id);
    // يمكنك تنفيذ المنطق المطلوب هنا (مثل حفظ الطلب في قاعدة البيانات)

    return redirect()->route('services.purchase')->with('success', 'تم شراء الخدمة بنجاح!');
}

}
