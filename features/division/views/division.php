<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overlogic EMS</title>
    <link href="/features/division/styles/style.css" rel="stylesheet" />

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <li><a href="/employee">Employee</a></li>
                <li><a href="/division" class="active">Division</a></li>
                <li><a href="/logout" onclick="confirmLogout(event)">Log Out</a></li>
            </ul>
        </div>

        <div class="main" data-aos="fade-left">
            <div class="employee-list">
                <div class="emp" data-aos="fade-up" data-aos-delay="100">
                    <h2>Divisions</h2>
                    <a href="/add-division" class="AddDivision">Add division</a>
                </div>
                <br>
                <hr>
                <br>

                <table data-aos="fade-up" data-aos-delay="200">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Division Name</th>

                            <th class="ac">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($divisions as $division) : ?>
                            <tr>
                                <td>
                                    <strong style="margin-right: 10px;"><?= htmlspecialchars($division->getId()) ?></strong>
                                </td>
                                <td><?= htmlspecialchars($division->getName()) ?></td>

                                <td style="display: flex; justify-content: space-between;">
                                    <a href="/edit-division/<?= $division->getId() ?>" class="update">Update</a>
                                    <form action="/delete-division-process/<?= $division->getId() ?>" method="POST" onsubmit="confirmDelete(event, this)">
                                        <button type="submit" class="delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        AOS.init();

        function confirmLogout(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be logged out of the system.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, log out!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/logout';
                }
            });
        }

        function confirmDelete(event, form) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
</body>

</html>