@extends('Admins.indexAdmin')
{{ dd($rooms) }}

@if($rooms->isEmpty())
    <p>لا توجد بيانات لعرضها.</p>
@endif

@section('meta')
<title>لوحة الإدارة - الشقق</title>
@endsection

@section('content')
<pre>{{ print_r($rooms) }}</pre>

<div class="container">
    <h1 class="text-center my-4">جدول الشقق</h1>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>اسم الشقة</th>
                <th>الوصف</th>
                <th>السعر</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rooms as $room)
            <tr>
                <td>{{ $room->id }}</td>
                <td>{{ $room->name }}</td>
                <td>{{ $room->description }}</td>
                <td>{{ $room->price }} درهم</td>
                <td>
                    <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn btn-primary btn-sm">تعديل</a>
                    <form action="{{secure_url( route('admin.rooms.destroy', $room->id)) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">لا توجد شقق مسجلة.</td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>
@endsection
