
<!DOCTYPE html>
<html>
<head>
    <title>Student Portal | Departments</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f3f0;
            color: #26352b;
        }

        header {
            background: #203b2b;
            color: white;
            padding: 22px 8%;
        }

        header h2 {
            margin: 0;
            letter-spacing: 1px;
        }

        header p {
            margin: 6px 0 0;
            color: #d5ded6;
            font-size: 13px;
        }

        main {
            width: 84%;
            max-width: 1000px;
            margin: 35px auto;
        }

        .section {
            background: white;
            border: 1px solid #d5d9d5;
            padding: 25px;
            margin-bottom: 25px;
        }

        h1 {
            margin-top: 0;
            font-size: 28px;
        }

        h2 {
            margin-top: 0;
            font-size: 19px;
            color: #203b2b;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
        }

        input {
            width: 100%;
            max-width: 450px;
            padding: 12px;
            border: 1px solid #bfc8c0;
            font-size: 15px;
            margin-bottom: 15px;
        }

        button {
            display: block;
            background: #203b2b;
            color: white;
            border: none;
            padding: 12px 22px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background: #31563e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #d5d9d5;
            padding: 13px;
            text-align: left;
        }

        th {
            background: #203b2b;
            color: white;
        }

        tr:nth-child(even) {
            background: #f3f3f0;
        }

        .error {
            background: #fbe9e7;
            border: 1px solid #d9a49d;
            color: #8b2520;
            padding: 12px;
            margin-bottom: 20px;
        }

        .navigation {
            margin-top: 25px;
        }

        .navigation a {
            color: #203b2b;
            margin-right: 20px;
            font-weight: bold;
            text-decoration: none;
        }

        .navigation a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #68736b;
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
        }
    </style>
</head>

<body>

    <header>
        <h2>STUDENT PORTAL</h2>
        <p>STUDENT REGISTRATION SYSTEM</p>
    </header>

    <main>

        <h1>Department Management</h1>
        <p>Add and view the departments registered in the system.</p>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="section">
            <h2>ADD DEPARTMENT</h2>

            <form action="/departments" method="POST">
                @csrf

                <label>Department Name:</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter department name"
                    required
                >

                <button type="submit">ADD DEPARTMENT</button>
            </form>
        </div>

        <div class="section">
            <h2>DEPARTMENT LIST</h2>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Department Name</th>
                </tr>

                @forelse($departments as $department)
                    <tr>
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">No departments registered yet.</td>
                    </tr>
                @endforelse
            </table>
        </div>

        <div class="navigation">
            <a href="/">STUDENT REGISTRATION</a>
            <a href="/courses">MANAGE COURSES</a>
        </div>

    </main>

    <footer>
        STUDENT REGISTRATION SYSTEM
    </footer>

</body>
</html>
