<!-- resources/views/chat/show.blade.php -->

@section('content')
<div class="container">
    <h1>محادثة مع {{ $chat->service->name }}</h1> <!-- هنا يجب أن يعمل بشكل صحيح الآن -->

    <div class="chat-box" style="border: 1px solid #ddd; padding: 15px; border-radius: 5px; height: 400px; overflow-y: scroll;">
        @foreach($chats as $chatMessage) <!-- تغيير الاسم إلى chatMessage لتجنب الارتباك -->
            <div class="chat-message" style="margin-bottom: 10px;">
                <strong>{{ $chatMessage->user->name }}:</strong>
                <span>{{ $chatMessage->message }}</span>
                <br>
                <small class="text-muted">{{ $chatMessage->created_at->format('Y-m-d H:i') }}</small>
            </div>
        @endforeach
    </div>
    
    <form action="{{ route('chat.send') }}" method="POST" style="margin-top: 15px;">
        @csrf
        <input type="hidden" name="service_id" value="{{ $chat->service->id }}">
        <div class="input-group">
            <input type="text" name="message" class="form-control" placeholder="أدخل رسالتك هنا..." required>
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">إرسال</button>
            </div>
        </div>
    </form>
</div>
@endsection
