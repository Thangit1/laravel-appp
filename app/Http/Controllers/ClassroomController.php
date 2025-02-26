<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    // Hiển thị danh sách lớp học với tìm kiếm và phân trang
    public function index(Request $request)
    {
        $query = Classroom::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%$search%");
        }

        $classrooms = $query->paginate(10);
        return view('classrooms.index', compact('classrooms'));
    }

    // Hiển thị form tạo lớp học
    public function create()
    {
        return view('classrooms.create');
    }

    // Lưu lớp học mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'teacher' => 'nullable|string|max:255',
        ]);

        Classroom::create([
            'name' => $request->name,
            'teacher' => $request->teacher,
        ]);

        return redirect()->route('classrooms.index')->with('success', 'Thêm lớp học thành công!');
    }

    // Hiển thị thông tin lớp học cùng danh sách sinh viên
    public function show(Classroom $classroom)
    {
        // Lấy danh sách sinh viên trong lớp
        $students = Student::where('classroom_id', $classroom->id)->get();
        
        return view('classrooms.show', compact('classroom', 'students'));
    }

    // Hiển thị form chỉnh sửa lớp học
    public function edit(Classroom $classroom)
    {
        return view('classrooms.edit', compact('classroom'));
    }

    // Cập nhật lớp học
    public function update(Request $request, Classroom $classroom)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'teacher' => 'nullable|string|max:255',
        ]);

        $classroom->update([
            'name' => $request->name,
            'teacher' => $request->teacher,
        ]);

        return redirect()->route('classrooms.index')->with('success', 'Cập nhật lớp học thành công!');
    }

    // Xóa lớp học (Kiểm tra lớp có sinh viên hay không)
    public function destroy(Classroom $classroom)
    {
        // Kiểm tra xem lớp học có sinh viên không
        $studentsCount = Student::where('classroom_id', $classroom->id)->count();
        if ($studentsCount > 0) {
            return redirect()->route('classrooms.index')->with('error', 'Không thể xóa lớp có sinh viên!');
        }

        $classroom->delete();
        return redirect()->route('classrooms.index')->with('success', 'Xóa lớp học thành công!');
    }
}
