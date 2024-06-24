<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overlogic - Edit Employee</title>
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
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/employee" class="active">Employee</a></li>
                <li><a href="/logout">Log Out</a></li>
            </ul>
        </div>

        <div class="main">
            <div class="employee-list">
                <h2>Edit Employee</h2>
                <form action="/edit-employee-process" method="POST">
                    <input type="hidden" name="employee_id" value="<?= htmlspecialchars($employee->getId()) ?>">

                    <table>
                        <tr>
                            <td>Employee Name:</td>
                            <td><input type="text" name="employee_name" value="<?= htmlspecialchars($employee->getName()) ?>" required></td>
                        </tr>
                        <tr>
                            <td>Division:</td>
                            <td>
                                <select name="division_id" required>
                                    <?php foreach ($divisions as $division) : ?>
                                        <?php $selected = $division->getId() == $division->getId() ? 'selected' : ''; ?>
                                        <option value="<?= htmlspecialchars($division->getId()) ?>" <?= $selected ?>>
                                            <?= htmlspecialchars($division->getName()) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="email" name="email" value="<?= htmlspecialchars($employee->getEmail()) ?>" required></td>
                        </tr>
                    </table>

                    <input class="submit" type="submit" value="Update">
                </form>
            </div>
        </div>
    </div>
</body>

</html>