@extends('layouts.app')

@section('content')
    <h2>Danh sách điểm</h2>

    <!-- Form tìm kiếm -->
    <form action="{{ route('grades.index') }}" method="GET" class="mb-3">
        <input type="text" name="search" class="form-control d-inline w-50" placeholder="Nhập tên sinh viên hoặc môn học..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>

    <a href="{{ route('grades.create') }}" class="btn btn-success">Thêm điểm</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Sinh viên</th>
                <th>Môn học</th>
                <th>Điểm</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grades as $grade)
            <tr>
                <td>{{ $grade->id }}</td>
                <td>{{ $grade->student->name }}</td>
                <td>{{ $grade->subject }}</td>
                <td>{{ $grade->score }}</td>
                <td>
                    <a href="{{ route('grades.edit', $grade->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('grades.destroy', $grade->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
