<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Employee Management System')</title>
    <style>
        :root {
            --bg: #f4f6fb;
            --card: #ffffff;
            --text: #1f2937;
            --muted: #6b7280;
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --danger: #dc2626;
            --border: #e5e7eb;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, sans-serif;
            background: var(--bg);
            color: var(--text);
        }
        a { color: var(--primary); text-decoration: none; }
        .topbar {
            background: #111827;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 24px;
        }
        .topbar a, .topbar button { color: #fff; }
        .brand { font-weight: 700; letter-spacing: .3px; }
        .nav { display: flex; gap: 16px; align-items: center; }
        .nav form { margin: 0; }
        .container { max-width: 1100px; margin: 28px auto; padding: 0 16px; }
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 8px 24px rgba(15, 23, 42, .06);
        }
        h1 { margin: 0 0 18px; font-size: 24px; }
        .toolbar { display: flex; justify-content: space-between; gap: 12px; margin-bottom: 16px; flex-wrap: wrap; }
        .btn {
            display: inline-block;
            border: 0;
            border-radius: 8px;
            padding: 9px 14px;
            background: var(--primary);
            color: #fff;
            cursor: pointer;
            font-size: 14px;
        }
        .btn:hover { background: var(--primary-dark); }
        .btn-light { background: #e5e7eb; color: #111827; }
        .btn-danger { background: var(--danger); }
        .btn-small { padding: 6px 10px; font-size: 13px; }
        input, select, textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 14px;
        }
        textarea { min-height: 90px; }
        label { display: block; margin-bottom: 6px; font-weight: 600; }
        .form-group { margin-bottom: 14px; }
        .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 10px; border-bottom: 1px solid var(--border); vertical-align: middle; }
        th { font-size: 13px; color: var(--muted); text-transform: uppercase; }
        .alert { padding: 10px 12px; border-radius: 8px; margin-bottom: 14px; }
        .alert-success { background: #dcfce7; color: #166534; }
        .alert-error { background: #fee2e2; color: #991b1b; }
        .error { color: var(--danger); font-size: 13px; margin-top: 4px; }
        .muted { color: var(--muted); }
        .avatar { width: 42px; height: 42px; border-radius: 50%; object-fit: cover; background: #e5e7eb; }
        .avatar-lg { width: 120px; height: 120px; border-radius: 16px; object-fit: cover; }
        .login-wrap { min-height: 100vh; display: grid; place-items: center; }
        .login-card { width: 100%; max-width: 420px; }
        .pagination { margin-top: 16px; }
        ul.pagination {
            display: flex;
            flex-direction: row;
            gap: 6px;
            flex-wrap: wrap;
            list-style: none;
            padding: 0;
            margin: 0;
            align-items: center;
        }
        .pagination .page-item { list-style: none; }
        .pagination .page-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            padding: 6px 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: #fff;
            color: var(--text);
            font-size: 14px;
        }
        .pagination .page-item:not(.disabled):not(.active) .page-link:hover {
            background: #eff6ff;
            border-color: var(--primary);
            color: var(--primary);
        }
        .pagination .page-item.active .page-link {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
        }
        .pagination .page-item.disabled .page-link {
            color: var(--muted);
            background: #f9fafb;
            cursor: default;
        }
        @media (max-width: 760px) {
            .grid { grid-template-columns: 1fr; }
            table { font-size: 13px; }
        }
    </style>
</head>
<body>
    @auth
        <header class="topbar">
            <div class="brand">Employee Management System</div>
            <nav class="nav">
                <a href="{{ route('employees.index') }}">Employees</a>
                <a href="{{ route('departments.index') }}">Departments</a>
                <span class="muted">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-small" type="submit">Logout</button>
                </form>
            </nav>
        </header>
    @endauth

    <main class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>
