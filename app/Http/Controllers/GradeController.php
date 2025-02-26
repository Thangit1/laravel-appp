<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    // Danh sách điểm số + Tìm kiếm
    public function index(Request $request)
    {
        $query = Grade::with('student');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('student', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            })->orWhere('subject', 'like', "%$search%");
        }

        $grades = $query->get();
        return view('grades.index', compact('grades'));
    }

    // Hiển thị form thêm điểm
    public function create()
    {
        $students = Student::all();
        return view('grades.create', compact('students'));
    }

    // Lưu điểm mới
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject' => 'required|string|max:255',
            'score' => 'required|numeric|min:0|max:100',
        ]);

        Grade::create($request->all());
        return redirect()->route('grades.index')->with('success', 'Thêm điểm thành công!');
    }

    // Hiển thị thông tin điểm số
    public function show(Grade $grade)
    {
        return view('grades.show', compact('grade'));
    }

    // Hiển thị form chỉnh sửa điểm
    public function edit(Grade $grade)
    {
        $students = Student::all();
        return view('grades.edit', compact('grade', 'students'));
    }

    // Cập nhật điểm số
    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject' => 'required|string|max:255',
            'score' => 'required|numeric|min:0|max:100',
        ]);

        $grade->update($request->all());
        return redirect()->route('grades.index')->with('success', 'Cập nhật điểm thành công!');
    }

    // Xóa điểm số
    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('grades.index')->with('success', 'Xóa điểm thành công!');
    }
}
