<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overlogic</title>
    <link href="/features/employee/styles/style.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../../assets/logog.png" type="image/x-icon">
</head>

<body>
    <nav class="navbar" data-aos="fade-down">
        <a href="https://www.instagram.com/overlogic.id"> <img src="../../../assets/logo.png" alt="Logo" class="logo"></a>
        <div class="user-info">
            <img src="../../../assets/profile.jpeg" alt="Profile" class="profile-pic">
            <span class="user-name"><?= $_SESSION['email'] ?? 'Freya Admin' ?></span>
        </div>
    </nav>

    <div class="container">
        <div class="sidebar" data-aos="fade-right">
            <div class="welcome">
                <h2>Welcome</h2>
                <p><?= $_SESSION['email'] ?? 'Freya Admin' ?></p>
            </div>
            <ul class="menu">
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/employee" class="active">Employee</a></li>
                <li><a href="/logout">Log Out</a></li>
            </ul>
        </div>

        <div class="main" data-aos="fade-left">
            <div class="employee-list">
                <h2>Employees</h2>
                <form id="employeeForm" action="/add-employee-process" method="POST">
                    <table>
                        <tr>
                            <td>Employee Name </td>
                            <td width="5%">:</td>
                            <td width="75%"><input type="text" name="employee_name" size="10" required></td>
                        </tr>
                        <tr>
                            <td>Division </td>
                            <td width="5%">:</td>
                            <td width="75%">
                                <select name="division_id">
                                    <?php foreach ($divisions as $division) {
                                        echo "<option value=\"{$division->getId()}\">{$division->getName()}</option>";
                                    } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Email </td>
                            <td width="5%">:</td>
                            <td width="75%"><input type="text" name="email" size="10" required></td>
                        </tr>
                    </table>
                    <input class="submit" type="submit" value="Masukkan">
                </form>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        AOS.init();

        document.getElementById('employeeForm').addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You're about to add a new employee!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add employee!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    </script>
</body>

</html>