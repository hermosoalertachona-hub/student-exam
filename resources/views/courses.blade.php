<!DOCTYPE html>
<html>

<head>
    <title>Student Portal | Courses</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff1f5;
            color: #333;
        }

        header {
            background: #be5b83;
            color: white;
            padding: 22px 8%;
        }

        header h2 {
            margin: 0;
            letter-spacing: 1px;
        }

        header p {
            margin: 6px 0 0;
            color: #ffe1eb;
            font-size: 13px;
        }

        main {
            width: 84%;
            max-width: 1000px;
            margin: 35px auto;
        }

        .section {
            background: white;
            border: 1px solid #f0cbd9;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 3px 12px rgba(190, 91, 131, 0.06);
        }

        h1 {
            margin-top: 0;
            font-size: 28px;
            color: #a83f6c;
        }

        h2 {
            margin-top: 0;
            font-size: 19px;
            color: #a83f6c;
        }

        main>p {
            color: #777;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            max-width: 450px;
            padding: 12px;
            border: 1px solid #e5c3d1;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 15px;
            background: white;
        }

        input:focus {
            outline: none;
            border-color: #d66b96;
            box-shadow: 0 0 0 2px rgba(214, 107, 150, 0.12);
        }

        button {
            display: block;
            background: #d66b96;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 12px 22px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: background 0.2s ease;
        }

        button:hover {
            background: #b94f7b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #f0cbd9;
            padding: 13px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background: #be5b83;
            color: white;
        }

        tr:nth-child(even) {
            background: #fff1f5;
        }

        .error {
            background: #fff0f0;
            border: 1px solid #f0caca;
            border-left: 4px solid #c62828;
            color: #a00000;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 13px;
        }

        .error p {
            margin: 4px 0;
        }

        .navigation {
            margin-top: 25px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .navigation a {
            color: #be5b83;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
        }

        .navigation a:hover {
            color: #a83f6c;
            text-decoration: underline;
        }

        footer {
            text-align: center;
            padding: 20px;
            border-top: 1px solid #f0cbd9;
            color: #a83f6c;
            font-size: 12px;
        }

        @media (max-width: 600px) {
            main {
                width: 92%;
            }

            .section {
                padding: 18px;
                overflow-x: auto;
            }

            h1 {
                font-size: 24px;
            }

            input {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>

    <header>
        <h2>STUDENT PORTAL</h2>
        <p>STUDENT REGISTRATION SYSTEM</p>
    </header>

    <main>

        <h1>Course Management</h1>
        <p>Add and view the courses available in the system.</p>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="section">
            <h2>ADD COURSE</h2>

            <form action="/courses" method="POST">
                @csrf

                <label>Course Name:</label>
                <input type="text" name="course_name" value="{{ old('course_name') }}" placeholder="Enter course name"
                    required>

                <label>Course Code:</label>
                <input type="text" name="course_code" value="{{ old('course_code') }}" placeholder="Enter course code"
                    required>

                <button type="submit">ADD COURSE</button>
            </form>
        </div>

        <div class="section">
            <h2>COURSE LIST</h2>

            <table>
                <tr>
                    <th>Course Name</th>
                    <th>Course Code</th>
                </tr>

                @forelse ($courses as $course)
                    <tr>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->course_code }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">No courses registered yet.</td>
                    </tr>
                @endforelse
            </table>
        </div>

        <div class="navigation">
            <a href="/">STUDENT REGISTRATION</a>
            <a href="/departments">MANAGE DEPARTMENTS</a>
        </div>

    </main>

    <footer>
        STUDENT REGISTRATION SYSTEM
    </footer>

</body>

</html>