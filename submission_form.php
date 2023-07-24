<?php

$con = mysqli_connect("localhost","root","","work_project");

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $reason = $_POST["reason"];

    $stmt = mysqli_prepare($con, "INSERT INTO applications (user_id, date_submitted, vacation_start_date, vacation_end_date, reason, status) VALUES (?, CURRENT_DATE(), ?, ?, ?, 'pending')");
    mysqli_stmt_bind_param($stmt, "iss", $user_id, $start_date, $end_date, $reason);


    if (mysqli_stmt_execute($stmt)) {
        echo "Application submitted successfully!";
    } else {
        echo "Error submitting application: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($con);
?>