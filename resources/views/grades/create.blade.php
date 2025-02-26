@extends('layouts.app')

@section('content')
    <h2>Thêm điểm</h2>
    <form action="{{ route('grades.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Sinh viên</label>
            <select name="student_id" class="form-control" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Môn học</label>
            <input type="text" name="subject" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Điểm</label>
            <input type="number" name="score" class="form-control" step="0.1" required>
        </div>
        <button type="submit" class="btn btn-success">Thêm</button>
        <a href="{{ route('grades.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
@endsection
# Step 5: Update the Controller