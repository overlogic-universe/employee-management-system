<!DOCTYPE html>
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
                    <form>
                        <tr>
                            <td>Employee Name </td>
                            <td width="5%">:</td>
                            <td width="75%"><input type="text" name="" size="10"></td>
                        </tr>
                        <tr>
                            <td>Division </td>
                            <td width="5%">:</td>
                            <td width="75%"><input type="text" name="" size="10"></td>
                        </tr>
                        <tr>
                            <td>Manager </td>
                            <td width="5%">:</td>
                            <td width="75%"><input type="text" name="" size="10"></td>
                        </tr>
                        <tr>
                            <td>Email </td>
                            <td width="5%">:</td>
                            <td width="75%"><input type="text" name="" size="10"></td>
                        </tr>
                </table>
                <input class="submit" type="submit" value="Update" name="update">
                </form>
            </div>
        </div>
    </div>
</body>

</html>