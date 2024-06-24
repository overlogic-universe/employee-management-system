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
        <a href="https://www.instagram.com/overlogic.id"> <img src="../../../assets/logo.png" alt="Logo" class="logo"></a>
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
                        <span><?= count($employees) ?></span>
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
                <!-- <div class="search-bar">
                    <span class="icon">🔍</span>
                    <input type="text" placeholder="Search Here">
                </div> -->
                <br>
                <hr>
                <br>
                <table>
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Email</th>
                            <th>Division</th>
                            <th>Status</th>
                            <th>Permission</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($employees as $employee) : ?>
                            <tr>
                                <td><img src="../../../assets/prof.png" alt="Profile" class="profile-pic"> <?= htmlspecialchars($employee->getName()) ?></td>
                                <td><?= htmlspecialchars($employee->getEmail()) ?></td>
                                <td>
                                    <?php foreach ($divisions as $division) : ?>
                                        <?php if ($employee->getDivisionId() == $division->getId()) : ?>
                                            <?= htmlspecialchars($division->getName()) ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td><span class="status <?= htmlspecialchars($employee->getStatus()) ?>"><?= htmlspecialchars($employee->getStatus()) ?></span></td>
                                <td><a href="/permission" class="permission">permission</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>