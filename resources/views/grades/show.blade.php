@extends('layouts.app')

@section('content')
    <h2>Chi tiết điểm</h2>
    <p><strong>Sinh viên:</strong> {{ $grade->student->name }}</p>
    <p><strong>Môn học:</strong> {{ $grade->subject }}</p>
    <p><strong>Điểm:</strong> {{ $grade->score }}</p>
    <a href="{{ route('grades.index') }}" class="btn btn-secondary">Quay lại</a>
@endsection
