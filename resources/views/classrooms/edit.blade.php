@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Chỉnh sửa lớp học</h2>
    <form action="{{ route('classrooms.update', $classroom) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Tên lớp</label>
            <input type="text" name="name" class="form-control" value="{{ $classroom->name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Giáo viên chủ nhiệm</label>
            <input type="text" name="teacher" class="form-control" value="{{ $classroom->teacher }}">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('classrooms.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
