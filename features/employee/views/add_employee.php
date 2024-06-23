<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
</head>
<style>
    /* style.css */

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #CDD8E4;
    }

    /* Navbar */
    .navbar {
        background-color: #fff;
        padding: 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .logo {
        width: 220px;
        height: 39px;
    }

    .icon {
        height: 60px;
        width: 60px;
    }

    .user-info {
        display: flex;
        align-items: center;
    }

    .profile-pic {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 20px;
    }

    .user-name {
        font-weight: bold;
    }

    /* Container */
    .container {
        display: flex;
        margin: 20px;
    }

    /* Sidebar */
    .sidebar {
        width: 250px;
        background-color: #242424;
        color: #fff;
        padding: 20px;
        margin-left: -20px;
        margin-top: -20px;
        margin-bottom: -50vh;
    }

    .sidebar p {
        margin-bottom: 50px;
    }

    .menu {
        list-style: none;
        padding: 0;
    }

    .menu li {
        margin-bottom: 10px;
    }

    .menu a {
        display: block;
        padding: 10px;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

    .menu a:hover {
        background-color: #555;
    }

    .menu .active {
        background-color: #555;
    }

    .menu-spacer {
        height: 20px;
    }

    /* Main Content */
    .main {
        width: calc(100% - 280px);
        margin-left: 20px;
        background-color: #fff;
        padding: 20px;
        border-radius: 12px;
    }

    .scan-qr-btn {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 10px;
        background-color: #0F1322;
        color: #FFFFFF;
        text-decoration: none;
    }

    .send-qr-btn {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 10px;
        background-color: #0F1322;
        color: #FFFFFF;
        text-decoration: none;
    }

    .dashboard {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .dashboard .employee-count,
    .dashboard .share-qr,
    .dashboard .scan-qr {
        background-color: #91A5CE;
        padding: 20px;
        border-radius: 20px;
        width: calc(33% - 10px);
        text-align: center;
        margin: 10px;
    }

    .dashboard .icon {
        font-size: 30px;
        margin-bottom: 10px;
    }

    .dashboard h3 {
        margin-bottom: 5px;
    }

    .dashboard input[type="text"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-top: 5px;
    }

    /* Employee List */
    .employee-list {
        background-color: #f2f2f2;
        padding: 20px;
        border-radius: 5px;
    }

    .emp {
        display: flex;
        align-items: center;
        gap: 600px;
        margin-bottom: 15px;
    }

    .AddEmployee {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 20px;
        background-color: #242424;
        color: #FFFFFF;
        text-decoration: none;
    }

    .search-bar {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .search-bar .icon {
        font-size: 20px;
        margin-right: 10px;
    }

    .search-bar input[type="text"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    th {

        font-weight: bold;
    }

    .emp {
        text-align: left;
    }

    .dv {
        text-align: left;
    }

    .ac {
        text-align: end;
    }

    td .profile-pic {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .submit {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        background-color: #83B4FF;
        color: #FFFFFF;
        position: absolute;
        right: 85px;
        top: 302.5px;
        text-decoration: none;
    }

    .input {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        background-color: #83B4FF;
        color: #FFFFFF;
        position: absolute;
        right: 85px;
        top: 262.5px;
        text-decoration: none;
    }

    .status {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-weight: bold;
        margin-right: 10px;
    }

    .status.on-boarding {
        background-color: #4CAF50;
        color: #fff;
    }

    .status.off-boarding {
        background-color: #f44336;
        color: #fff;
    }

    .permission {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        background-color: #ffeb3b;
        color: #000;
        text-decoration: none;
    }

    .update {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        background-color: #04B86E;
        color: #FFFFFF;
        text-decoration: none;
    }

    .delete {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        background-color: #FF7D7C;
        color: #FFFFFF;
        text-decoration: none;
    }
</style>

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
                <li><a href="/dashboard" >Dashboard</a></li>
                <li><a href="/employee" class="active">Employee</a></li>
                <li><a href="#">Log Out</a></li>
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
                <input class="submit" type="submit" value="Masukkan" name="submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>