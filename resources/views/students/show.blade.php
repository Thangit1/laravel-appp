@extends('layouts.app')

@section('content')
    <h2>Chi tiết sinh viên</h2>
    <p><strong>Tên:</strong> {{ $student->name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Ngày sinh:</strong> {{ $student->dob }}</p>
    <p><strong>Lớp học:</strong> {{ $student->classroom ? $student->classroom->name : 'Chưa có lớp' }}</p>

    <a href="{{ route('students.index') }}" class="btn btn-secondary">Quay lại</a>
@endsection
