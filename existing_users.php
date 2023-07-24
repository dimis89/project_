<?php
session_start();

if (!isset($_SESSION["admin_logged_in"]) || !$_SESSION["admin_logged_in"]) {
    header("Location: admin_signin.html");
    exit();
}

$host = "localhost";
$db_name = "work_project";
$db_user = "root";
$db_pass = "";

$con = mysqli_connect("localhost","root","","work_project");

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

$query = "SELECT first_name, last_name, email, user_type FROM users";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h1>Users List</h1>";
    echo "<table>";
    echo "<tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>User Type</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['user_type'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No users found.";
}

mysqli_close($con);
?>