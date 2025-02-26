@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Thông tin lớp học</h2>
    <p><strong>Tên lớp:</strong> {{ $classroom->name }}</p>
    <p><strong>Giáo viên chủ nhiệm:</strong> {{ $classroom->teacher ?? 'Chưa có' }}</p>

    <h4>Danh sách sinh viên</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Họ tên</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Không có sinh viên nào trong lớp này.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('classrooms.index') }}" class="btn btn-secondary">Quay lại</a>
</div>
@endsection
