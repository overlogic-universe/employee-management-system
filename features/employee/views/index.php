<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overlogic</title>
    <link href="/features/employee/styles/style.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" href="../../../assets/logog.png" type="image/x-icon">
</head>

<body>
    <nav class="navbar" data-aos="fade-down">
        <a href="https://www.instagram.com/overlogic.id"> <img src="../../../assets/logo.png" alt="Logo" class="logo"></a>
        <div class="user-info">
            <img src="../../../assets/logog.png" alt="Profile" class="profile-pic">
            <span class="user-name"><?= $_SESSION['email'] ?? 'Flora Admin' ?></span>
        </div>
    </nav>

    <div class="container">
        <div class="sidebar" data-aos="fade-right">
            <div class="welcome">
                <h2>Welcome</h2>
                <p><?= $_SESSION['email'] ?? 'Flora Admin' ?></p>
            </div>
            <ul class="menu">
                <li><a href="/dashboard" class="active">Dashboard</a></li>
                <li><a href="/employee">Employee</a></li>
                <li><a href="/division">Division</a></li>
                <li><a href="/logout" onclick="confirmLogout(event)">Log Out</a></li>
            </ul>
        </div>

        <div class="main">
            <div class="dashboard">
                <div class="employee-count" data-aos="fade-up" data-aos-delay="100">
                    <img alt="" src="../../../assets/prof.png" class="icon"></img>
                    <div>
                        <h3>Total Employee</h3>
                        <h1><?= count($employees) ?></h1>
                    </div>
                </div>
                <div class="share-qr" data-aos="fade-up" data-aos-delay="200">
                    <img alt="" src="../../../assets/email.png" class="icon"></img>
                    <div>
                        <h3>Share QR Code to Employee</h3>
                        <form action="/send-qr-code-process" method="POST" id="sendQRForm">
                            <button type="submit" class="send-qr-btn">Send QR</button>
                        </form>
                    </div>
                </div>
                <div class="scan-qr" data-aos="fade-up" data-aos-delay="300">
                    <img alt="" src="../../../assets/icon.png" class="icon"></img>
                    <div>
                        <h3>Scan QR Code Employee</h3>
                        <a href="/scan" class="scan-qr-btn">Scan Now</a>
                    </div>
                </div>
            </div>

            <div class="employee-list" data-aos="fade-up" data-aos-delay="400">
                <div style="display: flex; justify-content:space-between;">
                    <h2>Employees</h2>
                    <form action="/reset-status-process" method="POST" id="resetForm">
                        <button type="submit" style="cursor:pointer; color:white; background-color: red; border:none; border-radius: 20px; padding:10px 20px 10px 20px;">Reset</button>
                    </form>
                </div>
                <h3>
                    <?php
                    include_once "./core/helpers/date_time_formatter.php";
                    echo DateTimeFormatter::getDateTimeNow();
                    ?>
                </h3>
                <br>
                <hr>
                <br>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Employee Name</th>
                            <th>Email</th>
                            <th>Division</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($employees as $employee) : ?>
                            <tr>
                                <td>
                                    <strong style="margin-right: 10px;"><?= htmlspecialchars($employee->getId()) ?></strong>
                                </td>
                                <td style="display: flex; align-items: center;">
                                    <p><?= htmlspecialchars($employee->getName()) ?></p>
                                </td>
                                <td><?= htmlspecialchars($employee->getEmail()) ?></td>
                                <td>
                                    <?php foreach ($divisions as $division) : ?>
                                        <?php if ($employee->getDivisionId() == $division->getId()) : ?>
                                            <?= htmlspecialchars($division->getName()) ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td><span class="status <?= htmlspecialchars($employee->getStatus()) ?>"><?= htmlspecialchars($employee->getStatus()) ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        AOS.init();

        document.getElementById('logout').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be logged out!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, log out!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = this.href;
                }
            })
        });

        document.getElementById('sendQRForm').addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Sending QR Code',
                text: 'Please wait...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            });
            this.submit();
        });

        document.getElementById('resetForm').addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "This will reset all employee statuses!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reset it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
</body>

</html>