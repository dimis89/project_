<html>
<head>
    <title>Old Requests</title>
	<form action="submission_form.html" method="POST">
        <button type="submit">Submit Request</button>
    </form>
</head>
<body>
    <h1>Old Requests</h1>
<?php

$con = mysqli_connect("localhost","root","","work_project");

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

$query = "SELECT * FROM old_requests ORDER BY date_submitted DESC";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) { 
    
    echo '<table border="1">
            <tr>
                <th>Application ID</th>
                <th>User ID</th>
                <th>Date Submitted</th>
                <th>Vacation Start Date</th>
                <th>Vacation End Date</th>
                <th>Days Requested</th>
                <th>Status</th>
            </tr>';

 
    while ($row = mysqli_fetch_assoc($result)) {
        $days_requested = (strtotime($row['vacation_end_date']) - strtotime($row['vacation_start_date'])) / (60 * 60 * 24);

        echo '<tr>';
        echo '<td>' . $row['application_id'] . '</td>';
        echo '<td>' . $row['user_id'] . '</td>';
        echo '<td>' . $row['date_submitted'] . '</td>';
        echo '<td>' . $row['vacation_start_date'] . '</td>';
        echo '<td>' . $row['vacation_end_date'] . '</td>';
        echo '<td>' . $days_requested . '</td>';
        echo '<td>' . $row['status'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No old requests found.';
}


mysqli_close($con);
?>

</body
</html>