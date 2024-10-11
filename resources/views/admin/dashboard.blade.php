{{-- @extends('layouts.app') --}}

@section('content')
<div class="container">
    <h1>لوحة تحكم الإدارة</h1>

    <h2>الدردشات النشطة</h2>

    <div class="list-group">
        @foreach($chats as $chat)
            <div class="list-group-item" id="chat-{{ $chat->id }}">
                <h5 class="mb-1">محادثة مع {{ $chat->service->name }}</h5>
                <p><strong>{{ $chat->user->name }}:</strong> {{ $chat->message }}</p>
                <small class="text-muted">{{ $chat->created_at->format('Y-m-d H:i') }}</small>

                <!-- خيارات المحادثة -->
                <div class="mt-2">
                    <form action="{{ route('chat.accept', $chat->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">استلام</button>
                    </form>

                    <form action="{{ route('chat.close', $chat->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">إغلاق</button>
                    </form>

                    <a href="{{ route('chat.show', $chat->id) }}" class="btn btn-info btn-sm">عرض التفاصيل</a>

                    <!-- زر الحذف -->
                    <button class="btn btn-warning btn-sm" onclick="deleteChat({{ $chat->id }})">حذف</button>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function deleteChat(chatId) {
        if (confirm('هل أنت متأكد أنك تريد حذف هذه المحادثة؟')) {
            $.ajax({
                url: '/chat/' + chatId + '/delete',
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}' // إضافة توكن CSRF
                },
                success: function(response) {
                    // حذف العنصر من الصفحة
                    $('#chat-' + chatId).fadeOut('slow', function() {
                        $(this).remove();
                    });
                    alert(response.message); // عرض رسالة النجاح
                },
                error: function(xhr) {
                    alert('حدث خطأ أثناء حذف المحادثة!');
                }
            });
        }
    }
</script>
@endsection
