
@section('content')
<div class="container">
    <h1 class="mb-4">إدارة الخدمات</h1>
    <div class="mb-4">
        <a href="{{ route('admin.dashboard.services.create') }}" class="btn btn-success">إضافة خدمة جديدة</a>
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>اسم الخدمة</th>
                <th>الوصف</th>
                <th>السعر</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $service->name }}</td>
                <td>{{ Str::limit($service->description, 50) }}</td> <!-- عرض جزء من الوصف -->
                <td>{{ $service->price }}$</td>
                <td>
                    <a href="{{ route('admin.dashboard.services.edit', $service->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                    <form action="{{ route('admin.dashboard.services.destroy', $service->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذه الخدمة؟');">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
