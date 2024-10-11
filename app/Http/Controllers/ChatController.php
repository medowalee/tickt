<?php
namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        // جلب جميع المحادثات
        $chats = Chat::all();
        return view('admin.dashboard.chats.index', compact('chats'));
    }

    public function show($id)
{
    // عرض تفاصيل المحادثة
    $chat = Chat::with('messages')->findOrFail($id); // تأكد من جلب المحادثة مع الرسائل
    return view('admin.dashboard.chats.show', compact('chat'));
}


    public function close($id)
    {
        // إغلاق المحادثة
        $chat = Chat::findOrFail($id);
        $chat->status = 'closed'; // تغيير الحالة
        $chat->save();
        
        return redirect()->route('admin.chats.index')->with('success', 'تم إغلاق المحادثة بنجاح!');
    }

    public function destroy($id)
    {
        // حذف المحادثة
        $chat = Chat::findOrFail($id);
        $chat->delete();

        return redirect()->route('admin.chats.index')->with('success', 'تم حذف المحادثة بنجاح!');
    }
}
