@props([
    'title' => 'Student Management',
    'heading' => 'Student Management',
    'subheading' => 'Organize student records with a clean, focused dashboard.',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }}</title>
        <style>
            :root {
                --bg: #f4efe7;
                --panel: #fffaf3;
                --panel-strong: #fff;
                --text: #1f2937;
                --muted: #6b7280;
                --line: #e5d8c7;
                --accent: #b45309;
                --accent-dark: #7c2d12;
                --danger: #b91c1c;
                --success-bg: #dcfce7;
                --success-text: #166534;
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                font-family: Georgia, "Times New Roman", serif;
                color: var(--text);
                background:
                    radial-gradient(circle at top left, rgba(245, 158, 11, 0.18), transparent 30%),
                    linear-gradient(180deg, #f7f1e8 0%, #efe4d4 100%);
                min-height: 100vh;
            }

            a {
                color: inherit;
                text-decoration: none;
            }

            .shell {
                width: min(1100px, calc(100% - 32px));
                margin: 32px auto;
            }

            .hero {
                background: linear-gradient(135deg, rgba(124, 45, 18, 0.96), rgba(180, 83, 9, 0.92));
                color: #fff7ed;
                border-radius: 28px;
                padding: 28px;
                box-shadow: 0 20px 45px rgba(124, 45, 18, 0.2);
            }

            .hero-top {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 16px;
                flex-wrap: wrap;
            }

            .eyebrow {
                display: inline-block;
                padding: 6px 10px;
                border: 1px solid rgba(255, 247, 237, 0.35);
                border-radius: 999px;
                font-size: 12px;
                letter-spacing: 0.08em;
                text-transform: uppercase;
            }

            .hero h1 {
                margin: 16px 0 10px;
                font-size: clamp(2rem, 5vw, 3.75rem);
                line-height: 1;
            }

            .hero p {
                margin: 0;
                max-width: 640px;
                color: rgba(255, 247, 237, 0.84);
                font-size: 1rem;
            }

            .actions {
                display: flex;
                gap: 12px;
                flex-wrap: wrap;
            }

            .main-card {
                margin-top: 22px;
                background: rgba(255, 250, 243, 0.95);
                border: 1px solid rgba(229, 216, 199, 0.8);
                border-radius: 28px;
                padding: 24px;
                box-shadow: 0 18px 40px rgba(31, 41, 55, 0.08);
            }

            .button,
            button {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                border: 0;
                border-radius: 999px;
                padding: 12px 18px;
                font-size: 0.95rem;
                font-weight: 600;
                cursor: pointer;
                transition: transform 0.2s ease, opacity 0.2s ease;
            }

            .button:hover,
            button:hover {
                transform: translateY(-1px);
            }

            .button-primary {
                background: var(--accent);
                color: #fff;
            }

            .button-secondary {
                background: transparent;
                color: var(--accent-dark);
                border: 1px solid rgba(124, 45, 18, 0.22);
            }

            .button-danger {
                background: #fee2e2;
                color: var(--danger);
            }

            .flash {
                margin-bottom: 18px;
                padding: 14px 16px;
                border-radius: 18px;
                background: var(--success-bg);
                color: var(--success-text);
            }

            .grid {
                display: grid;
                gap: 18px;
            }

            .grid.two {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .stack {
                display: flex;
                flex-direction: column;
                gap: 18px;
            }

            .section-head {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 16px;
                flex-wrap: wrap;
                margin-bottom: 18px;
            }

            .section-head h2,
            .card h3 {
                margin: 0;
            }

            .section-head p,
            .card p,
            .meta,
            .empty-state p {
                margin: 0;
                color: var(--muted);
            }

            .card,
            .table-card {
                background: var(--panel-strong);
                border: 1px solid var(--line);
                border-radius: 22px;
                padding: 20px;
            }

            .stats {
                display: grid;
                gap: 14px;
                grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
                margin-bottom: 18px;
            }

            .stat-card strong {
                display: block;
                margin-top: 8px;
                font-size: 1.8rem;
                color: var(--accent-dark);
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                padding: 14px 10px;
                text-align: left;
                border-bottom: 1px solid var(--line);
                vertical-align: top;
            }

            th {
                font-size: 0.8rem;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                color: var(--muted);
            }

            tr:last-child td {
                border-bottom: 0;
            }

            .table-actions {
                display: flex;
                gap: 8px;
                flex-wrap: wrap;
            }

            form {
                margin: 0;
            }

            label {
                display: block;
                margin-bottom: 8px;
                font-weight: 600;
            }

            input,
            select,
            textarea {
                width: 100%;
                padding: 12px 14px;
                border-radius: 16px;
                border: 1px solid var(--line);
                background: #fffdf9;
                color: var(--text);
                font: inherit;
            }

            textarea {
                min-height: 120px;
                resize: vertical;
            }

            .field {
                display: flex;
                flex-direction: column;
                gap: 8px;
            }

            .error-list,
            .field-error {
                color: var(--danger);
            }

            .error-list {
                padding: 14px 16px;
                border-radius: 18px;
                background: #fee2e2;
                margin-bottom: 18px;
            }

            .field-error {
                font-size: 0.9rem;
            }

            .detail-grid {
                display: grid;
                gap: 14px;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            }

            .detail-item {
                padding: 16px;
                background: var(--panel);
                border-radius: 18px;
                border: 1px solid var(--line);
            }

            .detail-item span {
                display: block;
                margin-bottom: 6px;
                font-size: 0.8rem;
                letter-spacing: 0.06em;
                text-transform: uppercase;
                color: var(--muted);
            }

            .empty-state {
                text-align: center;
                padding: 40px 20px;
                border: 1px dashed var(--line);
                border-radius: 22px;
                background: rgba(255, 255, 255, 0.55);
            }

            .pagination {
                margin-top: 18px;
            }

            .pagination nav > div:first-child {
                display: none;
            }

            .pagination svg {
                width: 16px;
                height: 16px;
            }

            .pagination span,
            .pagination a {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-width: 38px;
                min-height: 38px;
                padding: 0 12px;
                border-radius: 999px;
                border: 1px solid var(--line);
                background: #fff;
                color: var(--text);
                margin-right: 6px;
            }

            @media (max-width: 768px) {
                .shell {
                    width: min(100% - 20px, 1100px);
                    margin: 16px auto;
                }

                .hero,
                .main-card,
                .table-card,
                .card {
                    padding: 18px;
                    border-radius: 22px;
                }

                .grid.two {
                    grid-template-columns: 1fr;
                }

                table,
                thead,
                tbody,
                th,
                td,
                tr {
                    display: block;
                }

                thead {
                    display: none;
                }

                tr {
                    padding: 14px 0;
                    border-bottom: 1px solid var(--line);
                }

                td {
                    border: 0;
                    padding: 8px 0;
                }

                td::before {
                    content: attr(data-label);
                    display: block;
                    font-size: 0.76rem;
                    letter-spacing: 0.06em;
                    text-transform: uppercase;
                    color: var(--muted);
                    margin-bottom: 4px;
                }
            }
        </style>
    </head>
    <body>
        <div class="shell">
            <section class="hero">
                <div class="hero-top">
                    <div>
                        <span class="eyebrow">Laravel Student Hub</span>
                        <h1>{{ $heading }}</h1>
                        <p>{{ $subheading }}</p>
                    </div>
                    <div class="actions">
                        <a class="button button-secondary" href="{{ route('students.index') }}">All Students</a>
                        <a class="button button-primary" href="{{ route('students.create') }}">Add Student</a>
                    </div>
                </div>
            </section>

            <main class="main-card">
                @if (session('success'))
                    <div class="flash">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="error-list">
                        <strong>Please fix the following:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </body>
</html>
