@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Danh sách Lớp Học</h2>
    <a href="{{ route('classrooms.create') }}" class="btn btn-primary mb-3">Thêm Lớp Học</a>
    
    <!-- Form tìm kiếm -->
    <form method="GET" action="{{ route('classrooms.index') }}" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Nhập tên lớp..." value="{{ request('search') }}"><button type="submit" class="btn btn-success mt-2">Tìm kiếm</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên lớp</th>
                <th>Giáo viên</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classrooms as $classroom)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $classroom->name }}</td>
                <td>{{ $classroom->teacher ?? 'Chưa có' }}</td>
                <td>
                    <a href="{{ route('classrooms.show', $classroom) }}" class="btn btn-info btn-sm">Xem</a>
                    <a href="{{ route('classrooms.edit', $classroom) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('classrooms.destroy', $classroom) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $classrooms->links() }}
</div>
@endsection
