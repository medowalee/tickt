<!-- resources/views/user/profile.blade.php -->
@extends('layouts.app') <!-- تأكد من أن لديك ملف تخطيط باسم app.blade.php -->

@section('content')
    <h1 class="text-center">ملف التعريف الخاص بك</h1>
    <p class="text-center">اسم المستخدم: {{ Auth::user()->name }}</p>
    <p class="text-center">البريد الإلكتروني: {{ Auth::user()->email }}</p>
    <!-- يمكنك إضافة المزيد من المعلومات هنا -->
@endsection
