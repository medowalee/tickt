
@section('content')
<div class="container">
    <h1 class="mb-4">لوحة التحكم</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>إحصائيات المستخدمين</h5>
                </div>
                <div class="card-body">
                    <p>عدد المستخدمين: {{ $userCount }}</p>
                    <a href="{{ route('admin.dashboard.users') }}" class="btn btn-primary">عرض المستخدمين</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>إحصائيات الخدمات</h5>
                </div>
                <div class="card-body">
                    <p>عدد الخدمات: {{ $serviceCount }}</p>
                    <a href="{{ route('admin.dashboard.services') }}" class="btn btn-primary">عرض الخدمات</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>إحصائيات المحادثات</h5>
                </div>
                <div class="card-body">
                    <p>عدد المحادثات: {{ $chatCount }}</p>
                    <a href="{{ route('admin.dashboard.chats') }}" class="btn btn-primary">عرض المحادثات</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
