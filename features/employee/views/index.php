<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
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
                <p>Elon Musk</p>
            </div>
            <ul class="menu">
                <li><a href="/dashboard" class="active">Dashboard</a></li>
                <li><a href="/employee">Employee</a></li>
                <li><a href="/logout">Log Out</a></li>
            </ul>
        </div>

        <div class="main">
            <div class="dashboard">
                <div class="employee-count">
                    <img src="../../../assets/prof.png" class="icon"></img>
                    <div>
                        <h3>Total Employee</h3>
                        <span>48</span>
                    </div>
                </div>
                <div class="share-qr">
                    <img src="../../../assets/email.png" class="icon"></img>
                    <div>
                        <h3>Share QR code to Employee</h3>
                        <button class="send-qr-btn">Send QR</button>
                    </div>
                </div>
                <div class="scan-qr">
                    <img src="../../../assets/icon.png" class="icon"></img>
                    <div>
                        <h3>Scan QR Code Employee</h3>
                        <button class="scan-qr-btn">Scan Now</button>
                    </div>
                </div>
            </div>

            <div class="employee-list">
                <h2>Employees</h2>
                <div class="search-bar">
                    <span class="icon">🔍</span>
                    <input type="text" placeholder="Search Here">
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Division</th>
                            <th>Manager</th>
                            <th>Status</th>
                            <th>Permission</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="../../../assets/profile.jpg" alt="Profile" class="profile-pic"> Afrizal Putra Pratama</td>
                            <td>Ui/Ux Designer</td>
                            <td>Gilang Sri N.</td>
                            <td><span class="status on-boarding">On Boarding</span></td>
                            <td><a href="/permission" class="permission">permission</a></td>
                        </tr>
                        <tr>
                            <td><img src="../../../assets/profile.jpg" alt="Profile" class="profile-pic"> Afrizal Putra Pratama</td>
                            <td>Ui/Ux Designer</td>
                            <td>Gilang Sri N.</td>
                            <td><span class="status off-boarding">Off Boarding</span></td>
                            <td><a href="permission.php" class="permission">permission</a></td>
                        </tr>
                        <tr>
                            <td><img src="../../../assets/profile.jpg" alt="Profile" class="profile-pic"> Afrizal Putra Pratama</td>
                            <td>Ui/Ux Designer</td>
                            <td>Gilang Sri N.</td>
                            <td><span class="status on-boarding">On Boarding</span></td>
                            <td><a href="permission.php" class="permission">permission</a></td>
                        </tr>
                        <tr>
                            <td><img src="../../../assets/profile.jpg" alt="Profile" class="profile-pic"> Afrizal Putra Pratama</td>
                            <td>Ui/Ux Designer</td>
                            <td>Gilang Sri N.</td>
                            <td><span class="status on-boarding">On Boarding</span></td>
                            <td><a href="permission.php" class="permission">permission</a></td>
                        </tr>
                        <tr>
                            <td><img src="../../../assets/profile.jpg" alt="Profile" class="profile-pic"> Afrizal Putra Pratama</td>
                            <td>Ui/Ux Designer</td>
                            <td>Gilang Sri N.</td>
                            <td><span class="status on-boarding">On Boarding</span></td>
                            <td><a href="permission.php" class="permission">permission</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>