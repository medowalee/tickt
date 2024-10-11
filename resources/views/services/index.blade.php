

@section('content')
<div class="container">
    <h1>اختر خدمة للشراء</h1>

    <div class="list-group">
        @foreach($services as $service)
            <div class="list-group-item">
                <h5 class="mb-1">{{ $service->name }}</h5>
                <p>{{ $service->description }}</p>
                <strong>السعر: {{ $service->price }}$</strong>

                <!-- زر الشراء -->
                <form>
                    <!-- محتويات النموذج -->
                    <a href="{{ route('services.show', $service->id) }}" class="btn btn-info">عرض الخدمة</a>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
