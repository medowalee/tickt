<!-- resources/views/admin/dashboard/services/edit.blade.php -->

@section('content')
<div class="container">
    <h1>تعديل الخدمة</h1>

    <form action="{{ route('admin.dashboard.services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- أو 'PATCH' حسب طريقة التحديث الخاصة بك -->

        <div class="form-group">
            <label for="name">اسم الخدمة</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $service->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">الوصف</label>
            <textarea class="form-control" id="description" name="description">{{ $service->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">السعر</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $service->price }}" required>
        </div>

        <button type="submit" class="btn btn-primary">تحديث الخدمة</button>
    </form>
</div>
@endsection
