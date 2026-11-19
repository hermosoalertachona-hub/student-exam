
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal | Dashboard</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3f3f0;
            color: #252525;
        }

        header {
            background-color: #203b2b;
            color: white;
            padding: 22px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 25px;
        }

        header p {
            margin: 6px 0 0;
            font-size: 13px;
            color: #d5dfd7;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-right a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .logout-button {
            background-color: white;
            color: #203b2b;
            border: none;
            padding: 11px 18px;
            font-weight: bold;
            cursor: pointer;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 35px auto;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h2 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .welcome p {
            color: #666;
            margin: 0;
        }

        .section {
            background-color: white;
            border: 1px solid #d5d5d0;
            margin-bottom: 25px;
        }

        .section-title {
            background-color: #203b2b;
            color: white;
            padding: 17px 22px;
            font-size: 19px;
            font-weight: bold;
        }

        .section-content {
            padding: 25px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 9px;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #aaa;
            background-color: white;
            font-size: 15px;
        }

        input:focus, select:focus {
            outline: 2px solid #203b2b;
        }

        button {
            padding: 13px 22px;
            background-color: #203b2b;
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #31563e;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th {
            background-color: #203b2b;
            color: white;
            text-align: left;
            padding: 14px;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f5f6f3;
        }

        .course-link {
            display: inline-block;
            padding: 12px 18px;
            background-color: #203b2b;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .course-link:hover {
            background-color: #31563e;
        }

        .error-message {
            background-color: #fce8e8;
            border-left: 4px solid #c62828;
            color: #a00000;
            padding: 12px 18px;
            margin-bottom: 20px;
        }

        footer {
            background-color: #203b2b;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 13px;
            letter-spacing: 2px;
        }

        @media (max-width: 700px) {
            header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .header-right {
                width: 100%;
                justify-content: space-between;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .container {
                width: 94%;
            }

            .section-content {
                padding: 17px;
            }
        }
    </style>
</head>

<body>

    <header>
        <div>
            <h1>STUDENT PORTAL</h1>
            <p>STUDENT REGISTRATION SYSTEM</p>
        </div>

        <div class="header-right">
            <a href="/departments">Departments</a>
            <a href="/courses">Courses</a>

            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="logout-button">LOG OUT</button>
            </form>
        </div>
    </header>

    <div class="container">

        <div class="welcome">
            <h2>Student Dashboard</h2>
            <p>Manage student records, profiles, and course enrollments.</p>
        </div>

        @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- ADD STUDENT -->
        <div class="section">
            <div class="section-title">ADD NEW STUDENT</div>

            <div class="section-content">
                <form action="/students" method="POST">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group">
                            <label>Student Name</label>
                            <input type="text" name="name" required>
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Department</label>
                        <select name="department_id" required>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit">ADD STUDENT</button>
                </form>
            </div>
        </div>

        <!-- ADD PROFILE -->
        <div class="section">
            <div class="section-title">ADD STUDENT PROFILE</div>

            <div class="section-content">
                <form action="/profiles" method="POST">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group">
                            <label>Student</label>
                            <select name="student_id" required>
                                @foreach($students as $student)
                                    @if(!$student->profile)
                                        <option value="{{ $student->id }}">
                                            {{ $student->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" required>
                    </div>

                    <button type="submit">ADD PROFILE</button>
                </form>
            </div>
        </div>

        <!-- COURSE ENROLLMENT -->
        <div class="section">
            <div class="section-title">COURSE ENROLLMENT</div>

            <div class="section-content">
                <form action="/enroll" method="POST">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group">
                            <label>Student</label>
                            <select name="student_id" required>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">
                                        {{ $student->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Course</label>
                            <select name="course_id" required>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">
                                        {{ $course->course_name }} ({{ $course->course_code }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit">ENROLL STUDENT</button>
                </form>
            </div>
        </div>

        <!-- STUDENT LIST -->
        <div class="section">
            <div class="section-title">REGISTERED STUDENTS</div>

            <div class="section-content">
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Courses</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->department->name }}</td>

                                    <td>
                                        {{ $student->profile->address ?? 'No Profile' }}
                                    </td>

                                    <td>
                                        {{ $student->profile->phone ?? 'No Profile' }}
                                    </td>

                                    <td>
                                        @foreach($student->courses as $course)
                                            {{ $course->course_name }} ({{ $course->course_code }})<br>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <p>
            <a href="/courses" class="course-link">MANAGE COURSES</a>
        </p>

    </div>

    <footer>
        STUDENT REGISTRATION SYSTEM · 2026
    </footer>

</body>
</html>
