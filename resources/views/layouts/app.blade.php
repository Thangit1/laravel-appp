<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý học sinh</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: white;
            padding: 15px;
            position: fixed;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Quản lý học sinh</h2>
        <a href="{{ route('students.index') }}">📚 Quản lý học sinh</a>
        <a href="{{ route('grades.index') }}">📊 Quản lý điểm</a>
        <a href="{{ route('classrooms.index') }}">🏫 Quản lý lớp học</a> <!-- Thêm phần này -->
    </div>

    <!-- Content -->
    <div class="content">
        <h1 class="text-center">Hệ Thống Quản Lý Học Sinh</h1>
        <hr>
        @yield('content')
    </div>
</body>
</html>
