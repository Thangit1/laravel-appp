@extends('layouts.app')

@section('content')
    <h2>Sửa thông tin sinh viên</h2>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày sinh</label>
            <input type="date" name="dob" class="form-control" value="{{ $student->dob }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Lớp học</label>
            <select name="classroom_id" class="form-select" required>
                <option value="">-- Chọn lớp học --</option>
                @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}" {{ $student->classroom_id == $classroom->id ? 'selected' : '' }}>
                        {{ $classroom->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
@endsection
