<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Danh sách tất cả sinh viên + Tìm kiếm + Lọc theo lớp học
    public function index(Request $request)
    {
        $query = Student::with('classroom'); // Eager loading để tránh N+1 query

        // Lọc theo từ khóa tìm kiếm
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        // Lọc theo lớp học
        if ($request->has('classroom_id') && $request->classroom_id != '') {
            $query->where('classroom_id', $request->classroom_id);
        }

        $students = $query->paginate(10); // Phân trang 10 sinh viên mỗi trang
        $classrooms = Classroom::all(); // Lấy danh sách tất cả lớp học

        return view('students.index', compact('students', 'classrooms'));
    }

    // Hiển thị form tạo sinh viên
    public function create()
    {
        $classrooms = Classroom::all(); // Lấy danh sách lớp học để chọn
        return view('students.create', compact('classrooms'));
    }

    // Lưu sinh viên mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'dob' => 'required|date',
            'classroom_id' => 'required|exists:classrooms,id', // Kiểm tra lớp học có tồn tại
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Thêm sinh viên thành công!');
    }

    // Hiển thị thông tin sinh viên
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // Hiển thị form chỉnh sửa sinh viên
    public function edit(Student $student)
    {
        $classrooms = Classroom::all(); // Lấy danh sách lớp học để chọn khi chỉnh sửa
        return view('students.edit', compact('student', 'classrooms'));
    }

    // Cập nhật thông tin sinh viên
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'dob' => 'required|date',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Cập nhật thành công!');
    }

    // Xóa sinh viên
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Xóa sinh viên thành công!');
    }
}
