<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overlogic - Edit Division</title>
    <link href="/features/employee/styles/style.css" rel="stylesheet" />
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
                <li><a href="/division">Division</a></li>
                <li><a href="/division" class="active">Division</a></li>
                <li><a href="/logout">Log Out</a></li>
            </ul>
        </div>

        <div class="main" data-aos="fade-left">
            <div class="division-list">
                <h2>Edit Division</h2>
                <form id="editDivisionForm" action="/edit-division-process" method="POST">
                    <input type="hidden" name="division_id" value="<?= htmlspecialchars($division->getId()) ?>">

                    <table>
                        <tr>
                            <td>Division Name:</td>
                            <td><input type="text" name="division_name" value="<?= htmlspecialchars($division->getName()) ?>" required></td>
                        </tr>

                    </table>

                    <input class="submit" type="submit" value="Update">
                </form>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        AOS.init();

        document.getElementById('editDivisionForm').addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You're about to update this division's information.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    </script>
</body>

</html>