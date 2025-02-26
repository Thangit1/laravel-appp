@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Thêm Lớp Học</h2>
    <form action="{{ route('classrooms.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên lớp</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Giáo viên chủ nhiệm</label>
            <input type="text" name="teacher" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Thêm</button>
        <a href="{{ route('classrooms.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
