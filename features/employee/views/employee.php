<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <link href="/features/employee/styles/style.css" rel="stylesheet" />
</head>

<body>
    <nav class=" navbar">
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
                <p>Elon Musk</p>
            </div>
            <ul class="menu">
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/employee" class="active">Employee</a></li>
                <li><a href="#">Log Out</a></li>
            </ul>
        </div>

        <div class="main">
            <div class="employee-list">
                <div class="emp">
                    <h2>Employees</h2>
                    <a href="/add-employee" class="AddEmployee">Add employee</a>
                </div>
                <div class="search-bar">
                    <span class="icon">🔍</span>
                    <input type="text" placeholder="Search Here">
                </div>

                <table>
                    <thead>
                        <tr>
                            <th class="emp">Employee Name</th>
                            <th class="dv">Division</th>

                            <th class="ac">Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="../../../assets/profile.jpg" alt="Profile" class="profile-pic"> Afrizal Putra Pratama</td>
                            <td>Ui/Ux Designer</td>
                            <td><a href="/edit-employee" class="update">Update</a></td>
                            <td><button class="delete">Delete</button></td>
                        </tr>
                        <tr>
                            <td><img src="../../../assets/profile.jpg" alt="Profile" class="profile-pic"> Afrizal Putra Pratama</td>
                            <td>Ui/Ux Designer</td>
                            <td><a href="edit.php" class="update">Update</a></td>
                            <td><button class="delete">Delete</button></td>
                        </tr>
                        <tr>
                            <td><img src="../../../assets/profile.jpg" alt="Profile" class="profile-pic"> Afrizal Putra Pratama</td>
                            <td>Ui/Ux Designer</td>
                            <td><a href="edit.php" class="update">Update</a></td>
                            <td><button class="delete">Delete</button></td>
                        </tr>
                        <tr>
                            <td><img src="../../../assets/profile.jpg" alt="Profile" class="profile-pic"> Afrizal Putra Pratama</td>
                            <td>Ui/Ux Designer</td>
                            <td><a href="edit.php" class="update">Update</a></td>
                            <td><button class="delete">Delete</button></td>
                        </tr>
                        <tr>
                            <td><img src="../../../assets/profile.jpg" alt="Profile" class="profile-pic"> Afrizal Putra Pratama</td>
                            <td>Ui/Ux Designer</td>
                            <td><a href="edit.php" class="update">Update</a></td>
                            <td><button class="delete">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>