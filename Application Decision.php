<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $application_id = $_POST["application_id"];
    $decision = $_POST["decision"];
    $reason = $_POST["reason"];
    $vacation_start = $_POST["vacation_start_date"];
    $vacation_end = $_POST["vacation_end_date"];

    // Assuming you have a database or some mechanism to retrieve user details based on application_id
    $user = "John Doe"; // Replace this with the user's name

    $supervisor_email = "eft.dimis@outlook.com";
    $subject = "Application Decision for Application ID: $application_id";

    if ($decision === "accept") {
        $message = "Dear Supervisor,\n\n";
        $message .= "Employee $user has requested some time off, starting on $vacation_start and ending on $vacation_end.\n";
        $message .= "The reason provided by the employee: $reason.\n\n";
        $message .= "Please click the links below to make your decision:\n";
        $message .= "Accept: http://example.com/accept.php?application_id=$application_id\n";
        $message .= "Reject: http://example.com/reject.php?application_id=$application_id\n";
    } elseif ($decision === "reject") {
        $message = "Dear Supervisor,\n\n";
        $message .= "Employee $user's application with Application ID: $application_id has been rejected.\n\n";
    } else {
        echo "Invalid decision.";
        exit;
    }

    $headers = "From: noreply@example.com\r\n";
    if (mail($supervisor_email, $subject, $message, $headers)) {
        echo "Decision email sent successfully!";
    } else {
        echo "Failed to send decision email.";
    }
}
?>