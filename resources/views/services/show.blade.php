<!-- resources/views/services/show.blade.php -->

@section('content')
    <div class="container">
        <h1>{{ $service->name }}</h1>
        <p>{{ $service->description }}</p>

        <h2>التفاصيل:</h2>
        <ul>
            <li>السعر: {{ $service->price }} دينار</li>
            <li>المدة: {{ $service->duration }} دقيقة</li>
            <!-- يمكنك إضافة المزيد من التفاصيل حسب الحاجة -->
        </ul>

        <form action="{{ route('services.chat', $service->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">بدء الدردشة</button>
        </form>
    </div>
@endsection
