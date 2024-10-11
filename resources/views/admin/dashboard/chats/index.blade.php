{{-- @extends('admin.index') --}}

@section('content')
<div class="container">
    <h1>تفاصيل المحادثة</h1>

    <h2>رقم المحادثة: {{ $chat->id }}</h2>
    <h3>اسم الخدمة: {{ $chat->service->name }}</h3>
    <h4>الحالة: {{ $chat->status }}</h4>

    <h5>رسائل المحادثة:</h5>
    <ul>
        @foreach($chat->messages as $message)
            <li>{{ $message->content }} - <strong>{{ $message->created_at }}</strong></li>
        @endforeach
    </ul>

    <form action="{{ route('admin.chats.close', $chat->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-warning">إغلاق المحادثة</button>
    </form>

    <form action="{{ route('admin.chats.destroy', $chat->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">حذف المحادثة</button>
    </form>
</div>
@endsection
