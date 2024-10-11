@foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td><a href="{{ route('admin.users.statistics', $user->id) }}">إحصائيات</a></td>
    </tr>
@endforeach
