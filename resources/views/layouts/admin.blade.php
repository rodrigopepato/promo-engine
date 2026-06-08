<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Promo Engine Admin</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            color: #222;
        }

        header {
            background: #111827;
            color: white;
            padding: 16px 32px;
        }

        main {
            max-width: 1100px;
            margin: 32px auto;
            background: white;
            padding: 24px;
            border-radius: 8px;
        }

        a {
            color: #2563eb;
            text-decoration: none;
        }

        .nav {
            margin-top: 8px;
        }

        .nav a {
            color: #d1d5db;
            margin-right: 16px;
        }

        .btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 14px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
        }

        .btn-secondary {
            background: #4b5563;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 16px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 16px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 4px;
            margin-bottom: 14px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
        }

        label {
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border-bottom: 1px solid #e5e7eb;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #f9fafb;
        }
    </style>
</head>

<body>
    <header>
        <strong>Promo Engine Admin</strong>

        <div class="nav">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.promocoes.create') }}">Nova Promoção</a>
            <a href="{{ route('admin.promocoes.index') }}">Promoções Publicadas</a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
