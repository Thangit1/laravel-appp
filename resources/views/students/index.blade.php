@extends('layouts.app')

@section('content')
    <h2>Danh sách sinh viên</h2>

    <!-- Form tìm kiếm và lọc theo lớp -->
    <form action="{{ route('students.index') }}" method="GET" class="mb-3 d-flex align-items-center">
        <input type="text" name="search" class="form-control w-50 me-2" placeholder="Nhập tên sinh viên hoặc email..." value="{{ request('search') }}">
        
        <select name="classroom_id" class="form-select w-25 me-2">
            <option value="">-- Chọn lớp học --</option>
            @foreach ($classrooms as $classroom)
                <option value="{{ $classroom->id }}" {{ request('classroom_id') == $classroom->id ? 'selected' : '' }}>
                    {{ $classroom->name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>

    <a href="{{ route('students.create') }}" class="btn btn-success mb-3">Thêm sinh viên</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Ngày sinh</th>
                <th>Lớp học</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->dob }}</td>
                <td>{{ $student->classroom->name ?? 'Chưa có lớp' }}</td>
                <td>
                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">Xem</a>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    {{ $students->links() }}
@endsection
