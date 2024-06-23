<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overlogic</title>
    <link href="/features/employee/styles/style.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar">
        <img src="../../../assets/logo.png" alt="Logo" class="logo">
        <div class="user-info">
            <img src="../../../assets/profile.jpg" alt="Profile" class="profile-pic">
            <span class="user-name">Reva Fidela</span>
        </div>
    </nav>

    <div class="container">
        <div class="sidebar">
            <div class="welcome">
                <h2>Welcome</h2>
                <p>Admin</p>
            </div>
            <ul class="menu">
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/employee" class="active">Employee</a></li>
                <li><a href="/logout">Log Out</a></li>
            </ul>
        </div>

        <div class="main">
            <div class="employee-list">
                <h2>Employees</h2>
                <table>
                    <form action="/add-employee-process" method="POST">
                        <tr>
                            <td>Employee Name </td>
                            <td width="5%">:</td>
                            <td width="75%"><input type="text" name="employee_name" size="10"></td>
                        </tr>
                        <tr>
                            <td>Division </td>
                            <td width="5%">:</td>
                            <td width="75%">
                                <select name="division_id">
                                    <?php
                                    foreach ($divisions as $division) {
                                        echo "<option value=\"{$division['id']}\">{$division['division_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Email </td>
                            <td width="5%">:</td>
                            <td width="75%"><input type="text" name="email" size="10"></td>
                        </tr>
                </table>
                <input class="submit" type="submit" value="Masukkan" name="submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>